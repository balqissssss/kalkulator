<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(247, 126, 186);f;
        }
        .calculator {
            width: 320px;
            height: 480px;
            background: #222;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(219, 51, 143, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
        }
        .display {
            width: 90%;
            height: 60px;
            background: rgb(243, 77, 160);f;
            text-align: right;
            font-size: 2em;
            padding: 10px;
            border-radius: 30px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        button {
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 50%;
            font-size: 1.5em;
            cursor: pointer;
            background:rgb(255, 255, 255);
            transition: 0.3s;
        }
        button:active {
            background: #ddd;
        }
        .operator {
            background: rgb(243, 77, 160);f;
            color: white;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <div class="display" id="display">0</div>
        <div class="buttons">
            <button onclick="clearDisplay()">C</button>
            <button onclick="toggleNegative()">(-)</button>
            <button onclick="appendValue('%')">%</button>
            <button onclick="deleteLast()">⌫</button>
            <button onclick="appendValue('7')">7</button>
            <button onclick="appendValue('8')">8</button>
            <button onclick="appendValue('9')">9</button>
            <button class="operator" onclick="appendValue('-')">−</button>
            <button onclick="appendValue('4')">4</button>
            <button onclick="appendValue('5')">5</button>
            <button onclick="appendValue('6')">6</button>
            <button class="operator" onclick="appendValue('+')">+</button>
            <button onclick="appendValue('1')">1</button>
            <button onclick="appendValue('2')">2</button>
            <button onclick="appendValue('3')">3</button>
            <button class="operator" onclick="appendValue('*')">×</button>
            <button onclick="appendValue('0')">0</button>
            <button onclick="appendValue('.')">.</button>
            <button onclick="calculate()">=</button>
            <button class="operator" onclick="appendValue('/')">÷</button>
        </div>
    </div>

    <script>
        let display = document.getElementById("display");
        function appendValue(value) {
            if (display.innerText === "0" && value !== '.') {
                display.innerText = value;
            } else {
                display.innerText += value;
            }
        }
        function clearDisplay() {
            display.innerText = "0";
        }
        function deleteLast() {
            display.innerText = display.innerText.slice(0, -1);
            if (display.innerText === "") {
                display.innerText = "0";
            }
        }
        function toggleNegative() {
            let current = display.innerText;
            if (current !== "0" && !isNaN(current)) {
                display.innerText = current.startsWith('-') ? current.slice(1) : '-' + current;
            }
        }
        function calculate() {
            try {
                let result = eval(display.innerText.replace('%', '/100'));
                if (result === Infinity || result === -Infinity || isNaN(result)) {
                    display.innerText = "Tidak ada hasil";
                } else {
                    display.innerText = result;
                }
            } catch {
                display.innerText = "Error";
            }
        }
    </script>
</body>
</html>