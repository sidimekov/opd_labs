import { getData } from './data_manager.js';

let normalizeButton = document.getElementById("normalize");
let showAllButton = document.getElementById("showAll");
const tableRows = document.querySelectorAll(".table_row");

normalizeButton.addEventListener('click', () => {

    let genderId;
    if (document.querySelector('#male').checked) {
        genderId = 1;
    } else {
        genderId = 2;
    }

    let ageInterval = document.getElementById('norm-age').value;

    let formData = new FormData();
    formData.append("gender_id", genderId);
    formData.append("age_interval", ageInterval);
    // console.log(testId);

    var jsonResults = getData(formData, '../backend/requests/get_normalized_users.php');

    jsonResults.then(showLogins);
});

showAllButton.addEventListener('click', () => {
    showAllRows();
});

function showLogins(result) {

    showAllRows();

    if (result.response != null) {
        let logins = Object.values(result.response);

        tableRows.forEach((el) => {
            console.log(logins, el.id);
            if (logins.includes(el.id)) {
                //good
            } else {
                el.style.display = 'none';
            }
        });
    }
}

function showAllRows() {
    tableRows.forEach(element => {
        element.style.display = 'table-row';
    });
}


// окно для динамики
const chartWindow = document.getElementById("chart");
// кнопка закрытия окна
const closeWindow = document.getElementById("close_chart_window");
// кнопки открытия окон
const openWindowsTest = document.getElementsByName("show_test_dynamic");
// кнопки открытия окон
const openWindowsSpecUser = document.getElementsByName("show_spec_user_dynamic");
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

// открыть окно кнопками (динамика теста)
openWindowsTest.forEach((button) => {
    var testId = button.getAttribute("test_id");
    button.addEventListener('click', async () => {
        chartWindow.style.display = 'block';

        let formData = new FormData();
        formData.append("test_id", testId);
        // console.log(testId);

        var jsonResults = getData(formData, '../backend/requests/get_test_results.php');

        jsonResults.then(showChart);

    });
});


// открыть окно кнопками (динамика спец. юзера)
openWindowsSpecUser.forEach((button) => {
    var testId = button.getAttribute("test_id");
    var userId = button.getAttribute("user_id");
    button.addEventListener('click', async () => {
        chartWindow.style.display = 'block';

        let formData = new FormData();
        formData.append("test_id", testId);
        formData.append("user_id", userId);
        // console.log(testId);

        var jsonResults = getData(formData, '../backend/requests/get_spec_user_results.php');

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
        document.getElementById("window_message").innerHTML = "Тест ещё не пройден";
    }
}