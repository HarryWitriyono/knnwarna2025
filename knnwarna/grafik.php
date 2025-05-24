<!DOCTYPE html>
<html>
<head>
    <title>Grafik Scatter Data Training dan Uji (Canvas)</title>
    <style>
        canvas {
            border: 1px solid black;
            cursor: default; /* Ubah cursor menjadi default */
        }
    </style>
</head>
<body>
    <h1>Grafik Scatter Data Training dan Uji (Canvas)</h1>
    <canvas id="scatterCanvas" width="700" height="400"></canvas>
<?php
            require_once 'koneksi.db.php';

            $sql = "SELECT Kecerahan FROM datatraining";
            $result = mysqli_query($koneksi, $sql);
            $kecerahan = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kecerahan[] = floatval($row['Kecerahan']);
            }
            echo "<br>Data Training Kecerahan : ".json_encode($kecerahan);
            $sql = "SELECT Kejenuhan FROM datatraining";
            $result = mysqli_query($koneksi, $sql);
            $kejenuhan = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kejenuhan[] = floatval($row['Kejenuhan']);
            }
            echo "<br>Data Training Kejenuhan : ".json_encode($kejenuhan);
            $sql = "SELECT Kelas FROM datatraining";
            $result = mysqli_query($koneksi, $sql);
            $kelas = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kelas[] = $row['Kelas'];
            }
            echo "<br>Data Training Kelas : ".json_encode($kelas);
            $sql = "SELECT Kecerahan FROM datauji";
            $result = mysqli_query($koneksi, $sql);
            $kecerahanUji = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kecerahanUji[] = floatval($row['Kecerahan']);
            }
            echo "<br>Data Uji Kecerahan : ".json_encode($kecerahanUji);
            $sql = "SELECT Kejenuhan FROM datauji";
            $result = mysqli_query($koneksi, $sql);
            $kejenuhanUji = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kejenuhanUji[] = floatval($row['Kejenuhan']);
            }
            echo "<br>Data Uji Kejenuhan : ".json_encode($kejenuhanUji);
            $sql = "SELECT Kelas FROM datauji";
            $result = mysqli_query($koneksi, $sql);
            $kelasUji = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kelasUji[] = $row['Kelas'];
            }
            echo "<br>Data Uji Kelas : ".json_encode($kelasUji);
            ?>;
    <script>
        // Ambil data dari PHP yang sudah di-encode sebagai JSON untuk datatraining
        const dataTrainingKecerahan = <?php
            require_once 'koneksi.db.php';

            $sql = "SELECT Kecerahan FROM datatraining";
            $result = mysqli_query($koneksi, $sql);
            $kecerahan = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kecerahan[] = floatval($row['Kecerahan']);
            }
            echo json_encode($kecerahan);
            ?>;

        const dataTrainingKejenuhan = <?php
            $sql = "SELECT Kejenuhan FROM datatraining";
            $result = mysqli_query($koneksi, $sql);
            $kejenuhan = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kejenuhan[] = floatval($row['Kejenuhan']);
            }
            echo json_encode($kejenuhan);
            ?>;

        const dataTrainingKelas = <?php
            $sql = "SELECT Kelas FROM datatraining";
            $result = mysqli_query($koneksi, $sql);
            $kelas = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kelas[] = $row['Kelas'];
            }
            echo json_encode($kelas);
            ?>;

        // Ambil data dari PHP yang sudah di-encode sebagai JSON untuk datauji
        const dataUjiKecerahan = <?php
            $sql = "SELECT Kecerahan FROM datauji";
            $result = mysqli_query($koneksi, $sql);
            $kecerahanUji = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kecerahanUji[] = floatval($row['Kecerahan']);
            }
            echo json_encode($kecerahanUji);
            ?>;

        const dataUjiKejenuhan = <?php
            $sql = "SELECT Kejenuhan FROM datauji";
            $result = mysqli_query($koneksi, $sql);
            $kejenuhanUji = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kejenuhanUji[] = floatval($row['Kejenuhan']);
            }
            echo json_encode($kejenuhanUji);
            ?>;

        const dataUjiKelas = <?php
            $sql = "SELECT Kelas FROM datauji";
            $result = mysqli_query($koneksi, $sql);
            $kelasUji = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $kelasUji[] = $row['Kelas'];
            }
            echo json_encode($kelasUji);

            mysqli_close($koneksi);
            ?>;

        const canvas = document.getElementById('scatterCanvas');
        const ctx = canvas.getContext('2d');
        const width = canvas.width;
        const height = canvas.height;

        // Fungsi untuk menskalakan nilai ke rentang 0-100
        function scaleValue(value, min, max) {
            if (max === min) {
                return 50; // Handle kasus jika min dan max sama
            }
            return ((value - min) / (max - min)) * 100;
        }

        // Temukan nilai minimum dan maksimum dari data kecerahan dan kejenuhan
        const allKecerahan = [...dataTrainingKecerahan, ...dataUjiKecerahan];
        const allKejenuhan = [...dataTrainingKejenuhan, ...dataUjiKejenuhan];
        const dataMinKecerahan = Math.min(0);
        const dataMaxKecerahan = Math.max(100);
        const dataMinKejenuhan = Math.min(0);
        const dataMaxKejenuhan = Math.max(100);

        // Skala data kecerahan training
        const scaledTrainingKecerahan = dataTrainingKecerahan.map(value => scaleValue(value, dataMinKecerahan, dataMaxKecerahan));

        // Skala data kejenuhan training
        const scaledTrainingKejenuhan = dataTrainingKejenuhan.map(value => scaleValue(value, dataMinKejenuhan, dataMaxKejenuhan));

        // Skala data kecerahan uji
        const scaledUjiKecerahan = dataUjiKecerahan.map(value => scaleValue(value, dataMinKecerahan, dataMaxKecerahan));

        // Skala data kejenuhan uji
        const scaledUjiKejenuhan = dataUjiKejenuhan.map(value => scaleValue(value, dataMinKejenuhan, dataMaxKejenuhan));

        // Tentukan batas nilai untuk sumbu (tetapkan nilai tetap 0-100 setelah penskalaan)
        const minKecerahan = 0;
        const maxKecerahan = 100;
        const minKejenuhan = 0;
        const maxKejenuhan = 100;

        // Fungsi untuk memetakan nilai data ke koordinat canvas
        function mapX(value) {
            return ((value - minKecerahan) / (maxKecerahan - minKecerahan)) * (width - 50) + 25;
        }

        function mapY(value) {
            return height - (((value - minKejenuhan) / (maxKejenuhan - minKejenuhan)) * (height - 50) + 25);
        }

        // Warna untuk setiap kelas dan dataset
        const colors = {
            'MerahTraining': 'red',
            'BiruTraining': 'blue',
            'MerahUji': 'rgba(255, 0, 0, 0.5)', // Merah agak transparan
            'BiruUji': 'rgba(0, 0, 255, 0.5)'   // Biru agak transparan
        };

        // Array untuk menyimpan informasi titik (termasuk asal data dan nilai asli)
        const points = [];

        // Gambar sumbu X
        ctx.beginPath();
        ctx.moveTo(25, height - 25);
        ctx.lineTo(width - 25, height - 25);
        ctx.stroke();

        // Gambar sumbu Y
        ctx.beginPath();
        ctx.moveTo(25, height - 25);
        ctx.lineTo(25, 25);
        ctx.stroke();

        // Tambahkan label sumbu X
        ctx.fillText('Nilai Kecerahan (Skala 0-100)', width / 2, height - 5);

        // Tambahkan label sumbu Y
        ctx.save();
        ctx.translate(10, height / 2);
        ctx.rotate(-Math.PI / 2);
        ctx.fillText('Nilai Kejenuhan (Skala 0-100)', 0, 0);
        ctx.restore();

        // Gambar titik-titik scatter dari datatraining
        for (let i = 0; i < scaledTrainingKecerahan.length; i++) {
            const x = mapX(scaledTrainingKecerahan[i]);
            const y = mapY(scaledTrainingKejenuhan[i]);
            const kelas = dataTrainingKelas[i];
            const colorKey = `${kelas}Training`;
            const color = colors[colorKey] || 'black';

            ctx.beginPath();
            ctx.arc(x, y, 5, 0, 2 * Math.PI);
            ctx.fillStyle = color;
            ctx.fill();

            points.push({
                x: x,
                y: y,
                kecerahan: dataTrainingKecerahan[i], // Simpan nilai asli
                kejenuhan: dataTrainingKejenuhan[i], // Simpan nilai asli
                kelas: kelas,
                dataset: 'Training'
            });
        }

        // Gambar titik-titik scatter dari datauji
        for (let i = 0; i < scaledUjiKecerahan.length; i++) {
            const x = mapX(scaledUjiKecerahan[i]);
            const y = mapY(scaledUjiKejenuhan[i]);
            const kelas = dataUjiKelas[i];
            const colorKey = `${kelas}Uji`;
            const color = colors[colorKey] || 'black';

            ctx.beginPath();
            ctx.arc(x, y, 5, 0, 2 * Math.PI);
            ctx.fillStyle = color;
            ctx.fill();

            points.push({
                x: x,
                y: y,
                kecerahan: dataUjiKecerahan[i], // Simpan nilai asli
                kejenuhan: dataUjiKejenuhan[i], // Simpan nilai asli
                kelas: kelas,
                dataset: 'Uji'
            });
        }

        let hoveredPoint = null;

        // Fungsi untuk menggambar ulang grafik (tanpa tooltip)
        function redraw() {
            ctx.clearRect(0, 0, width, height);

            // Gambar sumbu X
            ctx.beginPath();
            ctx.moveTo(25, height - 25);
            ctx.lineTo(width - 25, height - 25);
            ctx.stroke();

            // Gambar sumbu Y
            ctx.beginPath();
            ctx.moveTo(25, height - 25);
            ctx.lineTo(25, 25);
            ctx.stroke();

            // Tambahkan label sumbu X
            ctx.fillText('Nilai Kecerahan (Skala 0-100)', width / 2, height - 5);

            // Tambahkan label sumbu Y
            ctx.save();
            ctx.translate(10, height / 2);
            ctx.rotate(-Math.PI / 2);
            ctx.fillText('Nilai Kejenuhan (Skala 0-100)', 0, 0);
            ctx.restore();

            // Gambar deretan nilai sumbu X (0-100)
            for (let i = 0; i <= 5; i++) {
                const value = minKecerahan + (maxKecerahan - minKecerahan) / 5 * i;
                const xPos = mapX(value);
                ctx.fillText(value.toFixed(0), xPos, height - 15);
                ctx.beginPath();
                ctx.moveTo(xPos, height - 25);
                ctx.lineTo(xPos, height - 20);
                ctx.stroke();
            }

            // Gambar deretan nilai sumbu Y (0-100)
            for (let i = 0; i <= 5; i++) {
                const value = minKejenuhan + (maxKejenuhan - minKejenuhan) / 5 * i;
                const yPos = mapY(value);
                ctx.fillText(value.toFixed(0), 10, yPos + 3);
                ctx.beginPath();
                ctx.moveTo(25, yPos);
                ctx.lineTo(30, yPos);
                ctx.stroke();
            }

            // Gambar ulang titik-titik
            for (const point of points) {
                const scaledX = scaleValue(point.kecerahan, dataMinKecerahan, dataMaxKecerahan);
                const scaledY = scaleValue(point.kejenuhan, dataMinKejenuhan, dataMaxKejenuhan);
                ctx.beginPath();
                ctx.arc(mapX(scaledX), mapY(scaledY), 5, 0, 2 * Math.PI);
                const colorKey = `${point.kelas}${point.dataset}`;
                ctx.fillStyle = colors[colorKey] || 'black';
                ctx.fill();
            }
        }

        // Fungsi untuk menggambar tooltip (menampilkan nilai asli)
        function drawTooltip(point) {
            const tooltipX = point.x + 10;
            const tooltipY = point.y - 40; // Sesuaikan posisi Y
            const message = `Kecerahan: ${point.kecerahan.toFixed(2)}\nKejenuhan: ${point.kejenuhan.toFixed(2)}\nKelas: ${point.kelas}\nDataset: ${point.dataset}`;
            const textWidth = ctx.measureText(message.split('\n').reduce((max, line) => Math.max(max, ctx.measureText(line).width), 0));
            const lineHeight = 12;
            const padding = 5;
            const tooltipWidth = textWidth + 2 * padding;
            const tooltipHeight = (message.split('\n').length * lineHeight) + 2 * padding + 5;

            ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';
            ctx.fillRect(tooltipX, tooltipY, tooltipWidth, tooltipHeight);

            ctx.fillStyle = 'white';
            ctx.font = `${lineHeight}px sans-serif`;
            message.split('\n').forEach((line, index) => {
                ctx.fillText(line, tooltipX + padding, tooltipY + (index + 1) * lineHeight + padding);
            });
        }

        // Event listener untuk mendeteksi pergerakan mouse di atas canvas
        canvas.addEventListener('mousemove', (event) => {
            const mouseX = event.clientX - canvas.getBoundingClientRect().left;
            const mouseY = event.clientY - canvas.getBoundingClientRect().top;

            hoveredPoint = null;
            for (const point of points) {
                const scaledX = scaleValue(point.kecerahan, dataMinKecerahan, dataMaxKecerahan);
                const scaledY = scaleValue(point.kejenuhan, dataMinKejenuhan, dataMaxKejenuhan);
                const dx = mouseX - mapX(scaledX);
                const dy = mouseY - mapY(scaledY);
                const distance = Math.sqrt(dx * dx + dy * dy);
                if (distance < 5) {
                    hoveredPoint = point;
                    canvas.style.cursor = 'pointer';
                    break;
                } else {
                    canvas.style.cursor = 'default';
                }
            }

            redraw();
            if (hoveredPoint) {
                drawTooltip(hoveredPoint);
            }
        });

        // Event listener untuk menghilangkan tooltip saat mouse keluar dari canvas
        canvas.addEventListener('mouseout', () => {
            hoveredPoint = null;
            canvas.style.cursor = 'default';
            redraw();
        });

        // Initial draw
        redraw();
    </script>
</body>
</html>