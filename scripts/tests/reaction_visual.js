import { sendData } from '../../scripts/data_manager.js';

const button = document.getElementById('button');
const progressBarText = document.getElementById('progressBarText');
const progress = document.getElementById('progress');
const results = document.getElementById('results');
const attempts = document.getElementById('attempts');
const timer = document.getElementById('timer');
const restartButton = document.getElementById('restartButton');
let attemptsCount = 0;
let successes = 0;
let totalTime = 0;

var timeoutId = -1;

function startProgress() {
    attemptsCount = 0;
    successes = 0;
    totalTime = 0;
    progress.style.width = '0%';
    const interval = setInterval(() => {
        progress.style.width = `${Math.min(100, (attemptsCount / 15) * 100)}%`;
        if (attemptsCount >= 15) {
            clearInterval(interval);
            button.removeEventListener('click', handleClick);
            button.style.backgroundColor = 'green';
            button.innerHTML = 'Тест пройден';

            if (successes > 4) {

                results.innerHTML = `Успешных попыток: ${successes}<br>Пропущенных попыток: ${attemptsCount - successes}<br>Среднее время успешных попыток: ${totalTime / successes}ms`;
                attempts.textContent = `Attempts: ${15}`;
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
                formData.append('test_id', 1);
                formData.append('reaction_time', reaction_time);
                formData.append('accuracy', accuracy);
                formData.append('misses', 0);
                formData.append('mistakes', 0);
                var result = sendData(formData, '../../backend/requests/send_user_results.php');
                console.log(result.response);

            } else {
                results.innerHTML = results.innerHTML + "Результаты не могут быть записаны, т.к. успешных попыток должно быть хотя бы 5.<br> Попробуйте ещё раз";
            }

        }
    }, 1000);
}

function handleClick() {
    attemptsCount++;
    if (attemptsCount < 16) {
        progressBarText.innerHTML = attemptsCount + "/15";
        if (button.style.backgroundColor === 'green') {
            successes++;
            totalTime += new Date() - startTime;
            timer.innerHTML = new Date() - startTime + "ms";
        }
        clearTimeout(timeoutId);
        startButton();
    }
}

function startButton() {
    const delay = Math.floor(Math.random() * 1500) + 2000; // Random delay between 2 and 3,5 seconds
    startTime = new Date();
    button.style.backgroundColor = 'red';
    button.innerHTML = 'Жди';
    timeoutId = setTimeout(() => {
        button.style.backgroundColor = 'green';
        button.innerHTML = 'Жми';
        startTime = new Date();
        button.addEventListener('click', handleClick);
    }, delay);
}

function restartGame() {
    attemptsCount = 0;
    timer.innerHTML = "00:00";
    progressBarText.innerHTML = "0/15";
    successes = 0;
    totalTime = 0;
    progress.style.width = '0%';
    results.textContent = '';
    attempts.textContent = '';
    startButton();
    startProgress();
}

let startTime;
startButton();
startProgress();
restartButton.addEventListener('click', restartGame);