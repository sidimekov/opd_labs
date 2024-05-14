import { sendData } from '../../scripts/data_manager.js';

const circle = document.getElementById('circle');
const button1 = document.getElementById('button1');
const button2 = document.getElementById('button2');
const button3 = document.getElementById('button3');
const results = document.getElementById('results');
const timer = document.getElementById('timer');
const timerText = document.getElementById('timerText');
const progressBarText = document.getElementById('progressBarText');
button1.style.backgroundColor = 'green';
button2.style.backgroundColor = 'blue';
button3.style.backgroundColor = 'red';
const attempts = document.getElementById('attempts');
const restartButton = document.getElementById('restartButton');
let attemptsCount = 0;
let successes = 0;
let totalTime = 0;
let currentColor = '#ccc';

var timeoutId = -1;

function startProgress() {
    if (attemptsCount < 15) {
        attemptsCount = 0;
        successes = 0;
        totalTime = 0;
        progress.style.width = '0%';
        const interval = setInterval(() => {
            progress.style.width = `${Math.min(100, (attemptsCount / 15) * 100)}%`;
            if (attemptsCount >= 15) {
                clearInterval(interval);
                button1.removeEventListener('click', handleClick);
                button2.removeEventListener('click', handleClick);
                button3.removeEventListener('click', handleClick);

                circle.innerHTML = 'Тест пройден'
                circle.style.backgroundColor = 'green';

                if (successes > 4) {
                    
                    timer.innerHTML = (totalTime/successes).toFixed(3)+" ms";
                    timerText.innerHTML = "Среднее время успешных попыток"+ "<br>Удачных: " + successes + "<br>Пропущенных: " + (attemptsCount - successes);

                    // расчёт оценок
                    var reaction_time = totalTime / successes;
                    var accuracy = successes;

                    // отправка оценок на серв
                    var formData = new FormData();
                    // id тестов:
                    // 1 - Тест на простые визуальные сигналы
                    // 2 - Тест на простые звуковые сигналы
                    // 3 - Тест на сложные цветные сигналы
                    // 4 - Тест сложные цифровые визуальные сигналы
                    // 5 - Тест на сложные цифровые звуковые сигналы
                    formData.append('test_id', 3);
                    formData.append('reaction_time', reaction_time);
                    formData.append('accuracy', accuracy);
                    formData.append('misses', 0);
                    formData.append('mistakes', 0);
                    var result = sendData(formData, '../../backend/requests/send_user_results.php');
                    console.log(result.response);

                } else {
                    timerText.innerHTML = "Результаты не могут быть записаны, т.к. успешных попыток должно быть хотя бы 5.<br> Попробуйте ещё раз";
                }
            }
        }, 1000);
    }
}

function handleClick(event) {
    if (attemptsCount < 15) {
        attemptsCount++;
        progressBarText.innerHTML = attemptsCount + "/15";
        if (event.target.style.backgroundColor === currentColor) {
            successes++;
            totalTime += new Date() - startTime;
            timer.innerHTML = new Date() - startTime + "ms";
        }
        circle.style.backgroundColor = 'gray';
        clearTimeout(timeoutId);
        startButton();
    }
}

function startButton() {
    if (attemptsCount < 15) {
        circle.style.backgroundColor = 'gray'; // Set circle to gray during delay
        const delay = Math.floor(Math.random() * 2000) + 1000; // Random delay between 1 and 3 seconds
        timeoutId = setTimeout(() => {
            const colors = ['red', 'blue', 'green'];
            startTime = new Date();
            currentColor = colors[Math.floor(Math.random() * colors.length)];
            circle.style.backgroundColor = currentColor;
            button1.addEventListener('click', handleClick);
            button2.addEventListener('click', handleClick);
            button3.addEventListener('click', handleClick);
        }, delay);
    }
}

function restartGame() {
    progressBarText.innerHTML = "0/15";
    timer.innerHTML = "00:00";
    timerText.innerHTML = "Last successful attempt time";
    circle.style.backgroundColor = 'gray';
    attemptsCount = 0;
    successes = 0;
    totalTime = 0;
    progress.style.width = '0%';
    startButton();
    startProgress();
}

let startTime;
startButton();
startProgress();
restartButton.addEventListener('click', restartGame);