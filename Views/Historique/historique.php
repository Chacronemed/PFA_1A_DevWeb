<?php require_once __DIR__.'../../SideBar/SideBar.php' ?>

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
		border-top: 2px solid #009578;
		border-bottom: 2px solid #009578;
	}

	.table td,
	.search-input1 {
		font-size: 1em;
		padding: 0.6em 1em;
	}

	.search-input1 {
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

    .search-input1 {
        padding-left: 30px; /* Adjust this value to create space for the icon */
    }
</style>

<section class="home">
  <h2 class="text">Historique</h2>
	<table class="table">
	<thead>
    <tr>
        <th>
            <div class="input-container">
                <i class="bx bx-search icon1"></i>
                <input type="text" class="search-input1" placeholder="ID Affectation">
            </div>
        </th>
        <th>
            <div class="input-container">
                <i class="bx bx-search icon1"></i>
                <input type="text" class="search-input1" placeholder="Nom Employe">
            </div>
        </th>
        <th>
            <div class="input-container">
                <i class="bx bx-search icon1"></i>
                <input type="text" class="search-input1" placeholder="ID Employe">
            </div>
        </th>
        <th>
            <div class="input-container">
                <i class="bx bx-search icon1"></i>
                <input type="text" class="search-input1" placeholder="Nom Produit">
            </div>
        </th>
        <th>
            <div class="input-container">
                <i class="bx bx-search icon1"></i>
                <input type="text" class="search-input1" placeholder="ID Produit">
            </div>
        </th>
        <th>
            <div class="input-container">
                <i class="bx bx-search icon1"></i>
                <input type="text" class="search-input1" placeholder="date d'affectation">
            </div>
        </th>
    </tr>
</thead>

		<tbody>
			<?php foreach($affectations as $affectation):?>
			<tr>
				<td class="table_data"><?php echo $affectation['ID_Aff']?></td>
				<td class="table_data"><?php echo $affectation['EmployeeName']." ".$affectation['Prenom']?></td>
				<td class="table_data"><?php echo $affectation['ID_Empl']?></td>
				<td class="table_data"><?php echo $affectation['ProductName']?></td>
				<td class="table_data"><?php echo $affectation['Id_Produit']?></td>
				<td class="table_data"><?php echo $affectation['Date_Aff']?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</section>

<script>
	document.addEventListener("DOMContentLoaded", () => {
		document.querySelectorAll(".search-input").forEach((inputField) => {
			const tableRows = inputField.closest("table").querySelectorAll("tbody > tr");
			const headerCell = inputField.closest("th");
			const otherHeaderCells = headerCell.closest("tr").children;
			const columnIndex = Array.from(otherHeaderCells).indexOf(headerCell);
			const searchableCells = Array.from(tableRows).map(
				(row) => row.querySelectorAll("td")[columnIndex]
			);

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
