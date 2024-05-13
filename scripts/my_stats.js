import { getData } from './data_manager.js';

// окно для динамики
const chartWindow = document.getElementById("chart");
// кнопка закрытия окна
const closeWindow = document.getElementById("close_chart_window");
// кнопки открытия окон
const openWindows = document.getElementsByName("show_my_dynamic");
// канва графика
const ctx = document.getElementById('my_chart').getContext('2d');
// график
var myChart = new Chart(ctx);

// закрытие при нажатии крестика
closeWindow.addEventListener('click', () => {
    chartWindow.style.display = 'none';
    myChart.destroy();
});

// закрытие при клике снаружи окна
chartWindow.addEventListener('click', (e) => {
    if (e.target == chartWindow) {
        chartWindow.style.display = 'none';
        myChart.destroy();
    }
});

// открыть окно кнопками
openWindows.forEach((button) => {
    var testId = button.getAttribute("test_id");
    button.addEventListener('click', async () => {
        chartWindow.style.display = 'block';

        let formData = new FormData();
        formData.append("test_id", testId);
        // console.log(testId);

        var jsonResults = getData(formData, '../backend/requests/get_user_results.php');

        jsonResults.then(showChart);

    });
});

function showChart(result) {
    var userResults;
    if (result.response != null) {
        // console.log(result);
        document.getElementById("window_message").innerHTML = "Динамика результатов";
        userResults = new Map(Object.entries(result.response));

        var reactionTimeMap = {};


        userResults.keys().forEach((key) => {
            let result = userResults.get(key);

            // console.log(result.reaction_time);
            reactionTimeMap[result.testing_date] = result.reaction_time;
        });

        console.log(reactionTimeMap);

        myChart.destroy();
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Время реакции в мс',
                    data: reactionTimeMap,
                    borderWidth: 1
                }]
            }
        });


    } else {
        // результатов нет
        document.getElementById("window_message").innerHTML = "Вы ещё не проходили этот тест";
    }
}