let ticketCount = 1;
const ticketPrice = 1600000;

function updateTotalPrice() {
  const totalPrice = ticketCount * ticketPrice;
  document.getElementById("ticketCount").value = ticketCount; // Update nilai pada elemen <input>
  document.getElementById(
    "totalPrice"
  ).textContent = `Rp. ${totalPrice.toLocaleString("id")}`;
  document.getElementById(
    "totalPrice"
  ).textContent = `Rp. ${totalPrice.toLocaleString("id")}`;
  document.querySelectorAll(".total_price").forEach((element) => {
    element.placeholder = `Rp. ${totalPrice.toLocaleString("id")}`;
    element.value = totalPrice; // Jika Anda ingin mengirimkan data ini ke server, tetapkan nilai input
  });
}

function incrementTicket() {
  ticketCount++;
  document.getElementById("ticketCount").textContent = ticketCount;
  updateTotalPrice();
}

function decrementTicket() {
  if (ticketCount > 1) {
    ticketCount--;
    document.getElementById("ticketCount").textContent = ticketCount;
    updateTotalPrice();
  }
}

// Jalankan updateTotalPrice() saat halaman dimuat
window.onload = updateTotalPrice;
