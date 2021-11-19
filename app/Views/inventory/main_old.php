<div class="col-lg-6 col-12">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>WHFG01 </h3>
              <!-- WHFG01	2316775,24	2588458	865238	593555,24 -->
              <!-- <p>On Hand Qty : <span class="text-right"></span> </p> -->
              <div class="row text-secondary">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Hand :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-1"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onHandWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Order :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-2"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onOrderWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Allocated :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-3"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="allocatedWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Economic Stock :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-4"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="ecoStockWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>WHFG02 </h3>
              <!-- WHFG01	2316775,24	2588458	865238	593555,24 -->
              <!-- <p>On Hand Qty : <span class="text-right"></span> </p> -->
              <div class="row text-secondary">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Hand :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-1"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onHandWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Order :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-2"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onOrderWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Allocated :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-3"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="allocatedWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Economic Stock :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-4"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="ecoStockWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

<script type="text/javascript">
        //renderData();

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
</script>