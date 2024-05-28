import {sendData} from '../../scripts/data_manager.js';

document.addEventListener("DOMContentLoaded", () => {


    const progressBarText = document.getElementById('progressBarText');
    const progress = document.getElementById('progress');
    const timer = document.getElementById('timer');
    const restartButton = document.getElementById('restartButton');
    var totalTime = 0;
    var startTime = 0;
    var points = 0;

    const imagePanel = document.getElementById("memory-image-panel");
    const instructions = document.getElementById("memory-instructions");
    const startButton = document.getElementById("memory-start-button");
    let currentStage = 0;

    const EMOJIS = ['☀️', '⭐️', '❄️', '⛈️', '🌈', '🌊', '🌻', '🍁', '🌸', '🌟', '🍕', '🎈', '🚀', '🌺', '🍦', '🎸', '🎨', '🐱', '🚲', '⚽'];

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

    function generateTable() {
        if (currentStage <= 5) {
            var color_pair = getRandomElement(COLOR_PAIRS);
        } else if (currentStage <= 10) {
            var letter_pair = getRandomElement(LETTER_PAIRS);
        } else {
            var symbol = getRandomElement(SHAPE_SYMBOLS);
        }

        table.innerHTML = "";

        for (let i = 0; i < 10; i++) {
            const row = table.insertRow();
            for (let j = 0; j < 10; j++) {
                const cell = row.insertCell();
                const btn = document.createElement("button");
                btn.classList.add("attention-table-cell");

                if (currentStage <= 5) {
                    if (chosenButtons[currentStage].row === i + 1 && chosenButtons[currentStage].col === j + 1) {
                        btn.style.backgroundColor = color_pair.adjusted;
                    } else {
                        btn.style.backgroundColor = color_pair.base;
                    }
                } else if (currentStage <= 10) {
                    btn.style.fontSize = "24px";
                    if (chosenButtons[currentStage].row === i + 1 && chosenButtons[currentStage].col === j + 1) {
                        btn.textContent = letter_pair.similar;
                    } else {
                        btn.textContent = letter_pair.base;
                    }
                } else {
                    btn.textContent = symbol;
                    if (chosenButtons[currentStage].row === i + 1 && chosenButtons[currentStage].col === j + 1) {
                        btn.style.fontSize = "16px";
                    } else {
                        btn.style.fontSize = Math.floor(Math.random() * 8) + 20 + "px";
                    }
                }

                btn.addEventListener("click", () => handleImageClick(i + 1, j + 1));
                cell.appendChild(btn);
            }
        }
    }

    function handleImageClick(image) {
        if (chosenButtons[currentStage].row === row && chosenButtons[currentStage].col === col) {
            currentStage++;
            if (currentStage < chosenButtons.length) {
                setInstruction();
                generateTable();
                let attTime = new Date() - startTime;
                totalTime += attTime;
                attentionTimes[currentStage] = attTime;
                timer.innerHTML = `${attTime}ms`;
                startTime = new Date();
            } else {
                instructions.textContent = "Тест завершен!";
                table.style.display = "none";
                console.log(Object.values(attentionTimes));

                let attentionTime = (totalTime / 15).toFixed(2);
                let stdDeviation = calculateStandardDeviation(Object.values(attentionTimes)).toFixed(2);

                instructions.innerHTML = `Среднее время успешных попыток: ${attentionTime}ms<br>Стандартное отклонение: ${stdDeviation}<br>Ошибок: ${mistakes}`;

                var stats = {
                    attention_time: attentionTime,
                    standard_deviation: stdDeviation,
                    mistakes: mistakes
                }

                var response = saveStats(stats, 10);

                console.log(response);

            }
            progressBarText.textContent = `${currentStage}/15`;
            progress.style.width = `${Math.min(100, (currentStage / 15) * 100)}%`;
        } else {
            let str = "<br>Неверная ячейка, попробуйте ещё раз";
            mistakes++;
            if (!instructions.innerHTML.includes(str)) {
                instructions.innerHTML += str;
            }
        }
    }

    function setInstruction() {
        if (currentStage <= 5) {
            instructions.textContent = `Нажмите на ячейку с отличающимся от других цветом`;
        } else if (currentStage <= 10) {
            instructions.textContent = `Нажмите на ячейку с отличающейся буквы`;
        } else {
            instructions.textContent = `Нажмите на ячейку с минимальным размером фигуры`;
        }
    }

    startButton.addEventListener("click", startTest);

    function startTest() {
        currentStage = 0;
        progressBarText.textContent = `0/15`;
        progress.style.width = `0%`;
        timer.innerHTML = "0ms";
        totalTime = 0;
        mistakes = 0;
        attentionTimes = [];
        generateStages();
        console.log(chosenButtons);
        setInstruction();
        table.style.display = "table";
        startButton.style.display = "none";
        generateTable();
        startTime = new Date();
    }

    table.style.display = "none";

    function restartGame() {
        startTest();
    }

    restartButton.addEventListener('click', restartGame);


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
