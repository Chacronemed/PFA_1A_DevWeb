<?php require_once __DIR__ . '/../SideBar/SideBar.php'; ?>

<style>
	.home {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.table-container {
		width: 90%;
		margin: auto;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		table-layout: fixed;
	}

	th,
	td {
		padding: 10px;
		text-align: center;
		border: 1px solid var(--text-color);
	}

	.table_head {
		font-size: 15px;
		color: var(--text-color);
	}

	.table_data {
		font-size: 15px;
		color: var(--text-color);
	}

	.table th {
		text-align: left;
		border-top: 2px solid gray;
		border-bottom: 2px solid gray;
	}

	.table td,
	.search-input {
		font-size: 1em;
		padding: 0.6em 1em;
	}

	.search-input {
		border: 0.5px solid;
		outline: none;
		font-family: "Fira Sans", sans-serif;
		width: 100%;
		box-sizing: border-box;
		background-color: var(--body-color);
	}

	/*input container icon */
	.input-container {
		position: relative;
		display: flex;
		align-items: center;
	}

	.icon1 {
		position: absolute;
		left: 10px;
		color: #999;
	}

	.search-input {
		padding-left: 30px;
		/* Adjust this value to create space for the icon */
	}
</style>

<section class="home">
	<h2 class="text">Historique</h2>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	<table class="table" id="data-table">
		<thead>
			<tr>
				<th>
					<div class="input-container">
						<i class="bx bx-search icon1"></i>
						<input type="text" class="search-input" placeholder="ID Affectation">
					</div>
				</th>
				<th>
					<div class="input-container">
						<i class="bx bx-search icon1"></i>
						<input type="text" class="search-input" placeholder="Nom Employe">
					</div>
				</th>
				<th>
					<div class="input-container">
						<i class="bx bx-search icon1"></i>
						<input type="text" class="search-input" placeholder="ID Employe">
					</div>
				</th>
				<th>
					<div class="input-container">
						<i class="bx bx-search icon1"></i>
						<input type="text" class="search-input" placeholder="Nom Produit">
					</div>
				</th>
				<th>
					<div class="input-container">
						<i class="bx bx-search icon1"></i>
						<input type="text" class="search-input" placeholder="ID Produit">
					</div>
				</th>
				<th>
					<div class="input-container">
						<i class="bx bx-search icon1"></i>
						<input type="text" class="search-input" placeholder="date d'affectation">
					</div>
				</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($affectations as $affectation) : ?>
				<tr>
					<td class="table_data"><?php echo $affectation['ID_Aff'] ?></td>
					<td class="table_data"><?php echo $affectation['EmployeeName'] . " " . $affectation['Prenom'] ?></td>
					<td class="table_data"><?php echo $affectation['ID_Empl'] ?></td>
					<td class="table_data"><?php echo $affectation['ProductName'] ?></td>
					<td class="table_data"><?php echo $affectation['Id_Produit'] ?></td>
					<td class="table_data"><?php echo $affectation['Date_Aff'] ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="button-container">
		<button class="button" onclick="generatePDF()">Generate PDF</button>
	</div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js" integrity="sha512-1/8DJLhOONj7obS4tw+A/2yb/cK9w5vWP+L4liQKYX/JeLZ/cqDuZfgDha4NK/kR/6b5IzHpS7/w80v4ED+8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	function generatePDF() {
		window.jsPDF = window.jspdf.jsPDF;
		const doc = new jsPDF();
		const table = document.getElementById('data-table');

		// Add title to the PDF
		const title = 'Historique des affectations';
		const titleWidth = doc.getStringUnitWidth(title) * doc.internal.getFontSize() / doc.internal.scaleFactor;
		const titleX = (doc.internal.pageSize.width - titleWidth) / 2;
		const titleY = 15;
		doc.setFontSize(20);
		doc.text(title, titleX, titleY);

		// Define columns and rows
		const columns = ['ID_Aff', 'EmployeeName', 'ID_Empl', 'ProductName', 'Id_Produit', 'Date_Aff'];
		const rows = [];

		// Extract data from table
		for (let i = 0; i < table.rows.length; i++) {
			const rowData = [];
			const row = table.rows[i];
			for (let j = 0; j < row.cells.length; j++) {
				rowData.push(row.cells[j].innerText);
			}
			rows.push(rowData);
		}

		// Set table format
		const tableConfig = {
			startY: 20,
			headStyles: {
				fillColor: [0, 0, 0]
			},
			head: [columns],
			body: rows
		};

		doc.autoTable(tableConfig);

		// Generate download link for the PDF
		const pdfData = doc.output('blob');
		const downloadLink = document.createElement('a');
		downloadLink.href = URL.createObjectURL(pdfData);
		downloadLink.download = 'EmployeeHistory.pdf'; // Set the desired filename here
		downloadLink.click();
	}
	document.addEventListener("DOMContentLoaded", () => {
		document.querySelectorAll(".search-input").forEach((inputField) => {
			const tableRows = inputField.closest("table").querySelectorAll("tbody > tr");
			const headerCell = inputField.closest("th");
			const otherHeaderCells = headerCell.closest("tr").children;
			const columnIndex = Array.from(otherHeaderCells).indexOf(headerCell);
			const searchableCells = Array.from(tableRows).map((row) => row.querySelectorAll("td")[columnIndex]);

			inputField.addEventListener("input", () => {
				const searchQuery = inputField.value.toLowerCase();

				for (const tableCell of searchableCells) {
					const row = tableCell.closest("tr");
					const value = tableCell.textContent.toLowerCase().replace(",", "");

					row.style.visibility = null;

					if (value.search(searchQuery) === -1) {
						row.style.visibility = "collapse";
					}
				}
			});
		});
	});
</script>
<style>
	.home {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: 100vh;
	}

	.button-container {
		margin-top: 20px;
		/* Ajoutez une marge en haut pour espacer le bouton du reste du contenu */
	}


	.button {
		padding: 1em 2em;
		border: none;
		border-radius: 5px;
		font-weight: bold;
		letter-spacing: 5px;
		text-transform: uppercase;
		color: #2c9caf;
		transition: all 1000ms;
		font-size: 15px;
		position: relative;
		overflow: hidden;
		outline: 2px solid #2c9caf;
	}

	button:hover {
		color: #ffffff;
		transform: scale(1.1);
		outline: 2px solid #70bdca;
		box-shadow: 4px 5px 17px -4px #268391;
	}

	button::before {
		content: "";
		position: absolute;
		left: -50px;
		top: 0;
		width: 0;
		height: 100%;
		background-color: var(--primary-color);
		transform: skewX(45deg);
		z-index: -1;
		transition: width 1000ms;
	}

	button:hover::before {
		width: 250%;
	}
</style>