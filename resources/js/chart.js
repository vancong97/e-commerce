$(document).ready(function () {
    let year = new Date().getFullYear();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/demo/public/index.php/admin/statistic/',
            method: "GET",
            data: { 'year': year },
            success: function (response){
                let ctx = document.getElementById("bar-chart-grouped").getContext("2d");
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: response.month,
                        datasets: [{
                              label: "Số lượng",
                              backgroundColor: "#3e95cd",
                              data: response.quantity,
                        }],
                    },
                    options: {
                        title: {
                            display: true,
                        }
                    }
                });
            }
        });
        $('select[name="chart"]').change(function () {
          let year = $(this).val();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: '/demo/public/index.php/admin/statistic/',
              method: "GET",
              data: { 'year': year },
              success: function (response){
                  let ctx = document.getElementById("bar-chart-grouped").getContext("2d");
                  new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: response.month,
                          datasets: [{
                                label: "Số lượng",
                                backgroundColor: "#3e95cd",
                                data: response.quantity,
                          }],
                      },
                      options: {
                          title: {
                              display: true,
                          }
                      }
                  });
              }
          });
        });
});

