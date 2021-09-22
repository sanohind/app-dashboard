document.addEventListener("DOMContentLoaded", function () {
  fetch(`${api_url}/stockbypart/?group=FG`, {
    mode: "no-cors",
  })
    .then((response) => {
      if (response.ok) {
        return Promise.resolve(response);
      } else {
        return Promise.reject(new Error("Failed to load"));
      }
    })
    .then((response) => response.json()) // parse response as JSON
    .then((data) => {
      const result = data.data;
      //console.log(result);
      $("#tableInventory").DataTable({
        responsive: true,
        autoWidth: false,
        data: result,
        columnDefs: [
          {
            targets: 0,
            render: function (data, type, row, meta) {
              if (type === "display") {
                // data = `<a href="http://localhost/app/public/inventory/${encodeURIComponent(data.toLowerCase())}">${data}</a>`;
                data = `<a href="#" onclick="showDetail('${data}')" data-id="${data}">${data}</a>`;
                // data =
                //   '<a href="http://localhost/app/public/inventory"' +
                //   encodeURIComponent(data.trim()) +
                //   '">' +
                //   data +
                //   "</a>";
              }
              return data;
            },
          },
          {
            targets: [3, 4, 5, 6],
            render: function (data, type, row, meta) {
              if (type === "display") {
                data = new Intl.NumberFormat().format(data);
              }
              return data;
            },
          },
        ],
        columns: [
          {
            data: "partno",
          },
          {
            data: "oldpartno",
          },
          {
            data: "partname",
          },
          {
            data: "onhand",
          },
          {
            data: "allocated",
          },
          {
            data: "onorder",
          },
          {
            data: "economicstock",
          },
        ],
        order: [
          [4, "desc"],
          [3, "asc"],
        ],
      });
      $("#olTable").remove();
    })
    .catch(function (error) {
      console.log(`Error: ${error.message}`);
      //alert(`Error: ${error.message}`);
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: `${error.message}. Please contact administrator!!`,
      });
    });

  renderData();

  function renderData() {
    fetch(`${api_url}/inventory/`, {
      mode: "no-cors",
    })
      .then((response) => {
        if (response.ok) {
          return Promise.resolve(response);
        } else {
          return Promise.reject(new Error("Failed to load"));
        }
      })
      .then((response) => response.json()) // parse response as JSON
      .then((data) => {
        const result = data.data;
        console.log(result.filter((res) => res.warehouse == "WHFG01"));
        renderWHFG01(result.filter((res) => res.warehouse == "WHFG01"));
        renderWHFG02(result.filter((res) => res.warehouse == "WHFG02"));
      })
      .catch(function (error) {
        console.log(`Error: ${error.message}`);
        //alert(`Error: ${error.message}`);
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: `${error.message}. Please contact administrator!!`,
        });
      });
  }

  function renderWHFG01(data) {
    console.log(data);
    const textOnhandFg1 = document.getElementById("onHandWhfg01");
    const textOrderFg1 = document.getElementById("onOrderWhfg01");
    const textAllocatedFg1 = document.getElementById("allocatedWhfg01");
    const textEcoStockFg1 = document.getElementById("ecoStockWhfg01");

    textOnhandFg1.innerText = new Intl.NumberFormat().format(data[0].onhand);
    textOnhandFg1.style.display = "block";
    textOrderFg1.innerText = new Intl.NumberFormat().format(data[0].onorder);
    textOrderFg1.style.display = "block";
    textAllocatedFg1.innerText = new Intl.NumberFormat().format(
      data[0].allocated
    );
    textAllocatedFg1.style.display = "block";
    textEcoStockFg1.innerText = new Intl.NumberFormat().format(
      data[0].economicstock
    );
    textEcoStockFg1.style.display = "block";
    $("#olfg1-1").remove();
    $("#olfg1-2").remove();
    $("#olfg1-3").remove();
    $("#olfg1-4").remove();
  }

  function renderWHFG02(data) {
    console.log(data);
    const textOnhandFg2 = document.getElementById("onHandWhfg02");
    const textOrderFg2 = document.getElementById("onOrderWhfg02");
    const textAllocatedFg2 = document.getElementById("allocatedWhfg02");
    const textEcoStockFg2 = document.getElementById("ecoStockWhfg02");

    textOnhandFg2.innerText = new Intl.NumberFormat().format(data[0].onhand);
    textOnhandFg2.style.display = "block";
    textOrderFg2.innerText = new Intl.NumberFormat().format(data[0].onorder);
    textOrderFg2.style.display = "block";
    textAllocatedFg2.innerText = new Intl.NumberFormat().format(
      data[0].allocated
    );
    textAllocatedFg2.style.display = "block";
    textEcoStockFg2.innerText = new Intl.NumberFormat().format(
      data[0].economicstock
    );
    textEcoStockFg2.style.display = "block";
    $("#olfg2-1").remove();
    $("#olfg2-2").remove();
    $("#olfg2-3").remove();
    $("#olfg2-4").remove();
  }
  
});

function showDetail(partno) {
    const dtTitle = document.getElementById('detailTitle');
    dtTitle.innerText = partno;
    $("#tableInventoryDetail").DataTable().destroy();

    fetch(`${api_url}/stockpartwh/?partno=${partno}`, {
        mode: "no-cors",
      })
        .then((response) => {
          if (response.ok) {
            return Promise.resolve(response);
          } else {
            return Promise.reject(new Error("Failed to load"));
          }
        })
        .then((response) => response.json()) // parse response as JSON
        .then((data) => {
          const result = data.data;
          const dtTable = $("#tableInventoryDetail").DataTable({
            responsive: true,
            autoWidth: false,
            data: result,
            columnDefs: [
              {
                targets: [1, 2, 3, 4],
                render: function (data, type, row, meta) {
                  if (type === "display") {
                    data = new Intl.NumberFormat().format(data);
                  }
                  return data;
                },
              },
            ],
            columns: [
              {
                data: "warehouse",
              },
              {
                data: "onhand",
              },
              {
                data: "allocated",
              },
              {
                data: "onorder",
              },
              {
                data: "economicstock",
              },
            ],
            order: [
              [0, "asc"]
            ],
          });
          $("#olTableDetail").remove();
        })
        .catch(function (error) {
          console.log(`Error: ${error.message}`);
          //alert(`Error: ${error.message}`);
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: `${error.message}. Please contact administrator!!`,
          });
        });

    $('#modal-detail').modal("show");
}
