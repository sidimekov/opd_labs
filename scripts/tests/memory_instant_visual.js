import {sendData} from '../../scripts/data_manager.js';

document.addEventListener("DOMContentLoaded", () => {


    const progressBarText = document.getElementById('progressBarText');
    const progress = document.getElementById('progress');
    const timer = document.getElementById('timer');
    const restartButton = document.getElementById('restartButton');

    const instructions = document.getElementById("memory-instructions");
    const startButton = document.getElementById("memory-start-button");
    const memoryPanel = document.getElementById('memoryPanel');


    function getRandomElements(arrOrObj, amount) {
        // Если передан объект, преобразуем его в массив ключей
        const elements = Array.isArray(arrOrObj) ? arrOrObj : Object.keys(arrOrObj);
        const result = [];
        const length = elements.length;

        if (length <= amount) {
            return elements; // Возвращаем все элементы, если их меньше или равно 5
        }

        while (result.length < amount) {
            const randomIndex = Math.floor(Math.random() * length);
            const randomElement = elements[randomIndex];
            if (!result.includes(randomElement)) {
                result.push(randomElement);
            }
        }

        return result;
    }


    const stages = [
        { images: 5, duration: 1000 },
        { images: 7, duration: 1000 },
        { images: 7, duration: 750 },
    ];

    const EMOJIS = ['☀️', '⭐️', '❄️', '⛈️', '🌈', '🌊', '🌻', '🍁', '🌸', '🌟', '🍕', '🎈', '🚀', '🌺', '🍦', '🎸', '🎨', '🐱', '🚲', '⚽'];
    let currentStage = 0;
    let shownImages = [];
    let correctClicks = 0;
    let totalClicks = 0;
    let startTime = 0;
    let reactionTimes = [];

    function startTest() {
        var mustClick = false;
        var clicked = false;
        startButton.style.display = 'none';
        memoryPanel.style.display = 'block';
        if (currentStage >= stages.length) {
            endTest();
            return;
        }

        const { images, duration } = stages[currentStage];
        shownImages = [];
        let displayedCount = 0;

        function showNextImage() {

            if (clicked && mustClick) {
                const timeTaken = (Date.now() - startTime) / 1000;
                correctClicks += currentStage + 1;
                reactionTimes.push(timeTaken);
            }

            if (displayedCount >= images * 5) {
                currentStage++;
                startTest();
                return;
            }

            let emoji = EMOJIS[Math.floor(Math.random() * EMOJIS.length)];
            if (Math.random() < 0.2 && shownImages.length > 0) {
                emoji = shownImages[Math.floor(Math.random() * shownImages.length)];
                mustClick = true;
            } else {
                shownImages.push(emoji);
            }

            memoryPanel.textContent = emoji;
            startTime = Date.now();

            displayedCount++;
            setTimeout(showNextImage, duration);
        }

        memoryPanel.onclick = function () {

            clicked = true;
            totalClicks++;
        };

        showNextImage();
    }

    function endTest() {
        const maxPoints = stages.reduce((sum, stage, index) => sum + (index + 1) * stage.images, 0) * 5;
        const accuracy = (correctClicks / maxPoints) * 100;
        const averageReactionTime = reactionTimes.reduce((sum, time) => sum + time, 0) / reactionTimes.length;

        instructions.textContent += `Точность: ${accuracy.toFixed(2)}`;
        instructions.innerHTML += "<br>";
        instructions.textContent += `Время реакции: ${averageReactionTime.toFixed(2)}`;
    }

    startButton.addEventListener('click', startTest);
    restartButton.addEventListener('click', ()=> location.reload());

    function saveStats(stats, testId) {
        // отправка оценок на серв
        var formData = new FormData();
        formData.append('test_id', testId);
        formData.append('statistics', JSON.stringify(stats));
        // этот метод sendData есть на серваке, локально работать не будет
        var result = sendData(formData, '../../backend/requests/send_user_results.php');
        return result.response;
    }

    function calculateStandardDeviation(data) {
        if (!data || data.length === 0) {
            return 0;
        }

        const n = data.length;
        const mean = data.reduce((acc, val) => acc + val, 0) / n;

        // Вычисляем сумму квадратов разностей от среднего значения
        const sumOfSquares = data.reduce((acc, val) => {
            if (typeof val === 'number') {
                return acc + Math.pow(val - mean, 2);
            } else {
                return acc;
            }
        }, 0);

        // Вычисляем стандартное отклонение
        const variance = sumOfSquares / n;
        return Math.sqrt(variance);
    }
});
