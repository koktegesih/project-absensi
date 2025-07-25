// Grafik Statistik Kehadiran
document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById("attendanceChart").getContext("2d");
  const attendanceChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Hadir", "Izin", "Sakit", "Alpa"],
      datasets: [
        {
          label: "Jumlah Kehadiran",
          data: [
            statistikData.hadir,
            statistikData.izin,
            statistikData.sakit,
            statistikData.alpa,
          ],
          backgroundColor: [
            "rgba(46, 204, 113, 0.7)",
            "rgba(52, 152, 219, 0.7)",
            "rgba(243, 156, 18, 0.7)",
            "rgba(231, 76, 60, 0.7)",
          ],
          borderColor: [
            "rgba(46, 204, 113, 1)",
            "rgba(52, 152, 219, 1)",
            "rgba(243, 156, 18, 1)",
            "rgba(231, 76, 60, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0,
          },
        },
      },
    },
  });

  // Auto focus ke input pertama pada form
  document.querySelector("form [name]")?.focus();

  // Auto close alert setelah 3 detik
  const alert = document.querySelector(".alert");
  if (alert) {
    setTimeout(() => {
      alert.classList.remove("show");
    }, 3000);
  }
});
