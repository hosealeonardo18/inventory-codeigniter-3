// add inventory
const currencyFormat = (num) => {
	return (
		Number(num)
			.toFixed(0)
			.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
	);
};

// function formatCurrency() {
// 	const hargaBarang = document.getElementById('harga');
// 	const value = hargaBarang.value;

// 	// Pastikan nilai yang diinputkan adalah angka
// 	if (!isNaN(value) && value !== '') {

// 		// Tampilkan hasil konversi ke dalam input
// 		hargaBarang.value = currencyFormat(value);
// 	}
// }
