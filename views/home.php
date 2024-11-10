


<div class="flex justify-center items-center">
    <div class="w-60 h-60"> 
        <canvas id="myChart" class="w-full h-full"></canvas>
    </div>
    <?php include "components/totalUsers.php"  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['available items', 'unavailable items', ],
      datasets: [{
        data: [<?= $availableItems[0]->available_items ?>, <?= $unavailableItems[0]->unavailable_items ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

