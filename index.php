<!DOCTYPE html>
<html>
<head>
    <title>Robot Arm Control Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .slider-container {
            margin-bottom: 15px;
        }

        .slider-container label {
            width: 80px;
            display: inline-block;
        }

        .slider-container input[type=range] {
            width: 300px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            text-align: center;
            padding: 8px;
        }

        button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h2>Robot Arm Control Panel</h2>
	<!DOCTYPE html>
<html>
<head>
    <title>Robot Arm Control Panel</title>
</head>
<body>
    <h2>Robot Arm Control Panel</h2>

    <form action="data.php" method="POST">
        <label for="motor1">Motor 1:</label>
        <input type="range" id="motor1" name="motor1" min="0" max="180" value="90" oninput="value1.innerText = this.value">
        <span id="value1">90</span><br><br>

        <label for="motor2">Motor 2:</label>
        <input type="range" id="motor2" name="motor2" min="0" max="180" value="90" oninput="value2.innerText = this.value">
        <span id="value2">90</span><br><br>

        <input type="submit" value="save">
    </form>
</body>
</html>

    <table id="poseTable">
        <thead>
            <tr>   
			    <th>id</th>
                <th>Motor 1</th>
                <th>Motor 2</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Poses will be inserted here -->
        </tbody>
    </table>

    <script>
        const motorCount = 2;
        const slidersContainer = document.getElementById("sliders");
        const poseTableBody = document.querySelector("#poseTable tbody");
        let poseIndex = 1;

        // Create sliders
        for (let i = 1; i <= motorCount; i++) {
            const div = document.createElement("div");
            div.className = "slider-container";

            const label = document.createElement("label");
            label.textContent = Motor ${i}:;

            const slider = document.createElement("input");
            slider.type = "range";
            slider.min = 0;
            slider.max = 180;
            slider.value = 90;
            slider.id = motor${i};
            slider.oninput = () => updateValueLabel(i);

            const valueLabel = document.createElement("span");
            valueLabel.id = value${i};
            valueLabel.textContent = slider.value;

            div.appendChild(label);
            div.appendChild(slider);
            div.appendChild(valueLabel);
            slidersContainer.appendChild(div);
        }

        function updateValueLabel(i) {
            const slider = document.getElementById(motor${i});
            const valueLabel = document.getElementById(value${i});
            valueLabel.textContent = slider.value;
        }

        function resetSliders() {
            for (let i = 1; i <= motorCount; i++) {
                document.getElementById(motor${i}).value = 90;
                updateValueLabel(i);
            }
        }

        function savePose() {
            const row = document.createElement("tr");

            // Pose index
            const indexCell = document.createElement("td");
            indexCell.textContent = poseIndex++;
            row.appendChild(indexCell);

            // Motor values
            const values = [];
            for (let i = 1; i <= motorCount; i++) {
                const value = document.getElementById(motor${i}).value;
                values.push(value);
                const cell = document.createElement("td");
                cell.textContent = value;
                row.appendChild(cell);
            }

            // Action buttons
            const actionCell = document.createElement("td");
            const loadBtn = document.createElement("button");
            loadBtn.textContent = "Load";
            loadBtn.onclick = () => {
                for (let i = 1; i <= motorCount; i++) {
                    document.getElementById(motor${i}).value = values[i - 1];
                    updateValueLabel(i);
                }
            };

            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Remove";
            removeBtn.onclick = () => {
                poseTableBody.removeChild(row);
            };

            actionCell.appendChild(loadBtn);
            actionCell.appendChild(removeBtn);
            row.appendChild(actionCell);

            poseTableBody.appendChild(row);
        }

        function run() {
            alert("Running the current pose with motors:\n" +
                Array.from({length: motorCount}, (_, i) => Motor ${i + 1}: ${document.getElementById(`motor${i + 1}).value}`).join("\n"));
        }
    </script>
</body>
</html>