function pie(json){console.log(json);

  let data = [];

  let categories = [];

  json.categories.forEach((item, i) => {
    if (categories.indexOf(item.category) === -1)
    {
      categories.push(item.category);
      data.push(0);
    }
  });


  json.data.forEach((item, i) => {
    categories.forEach((category, i) => {
      if (item.category === category) data[i] += item.price;
    });
  });


  // json.data.forEach((item, i) => {
  //     data.push(item.price);
  // });

  // let label = ['smartphone', 'ordinateur', 'accessoir'];
  // json.label.forEach((item, i) => {
  //     label.push(item.category);
  // });

  var ctx = document.getElementById('myChart').getContext('2d');

  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: categories,
          datasets: [{
              data: data,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          responsive: true
      }
  });

}
