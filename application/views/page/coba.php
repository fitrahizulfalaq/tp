<!DOCTYPE html>
<html>

<body>

  <p>Klik Untuk menentukan titik lokasi yang kamu inginkan</p>

  <button onclick="getLocation()">Tentukan Lokasi</button>
  <p id="lokasi"></p>
  <h3 id="lat-location"></h3>
  <h3 id="lng-location"></h3>
  <form action="<?= base_url("test/simpan")?>" method="post">
  <input type="hidden" id="lat-input" name="lat-input" readonly>
  <input type="hidden" id="lng-input" name="lng-input" readonly>
  <button>Kirim</button>
  </form>
  
  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      var elem = document.getElementById("lokasi-img");
      if (elem != null) {
        elem.parentNode.removeChild(elem);
        console.log("Posisi Sudah Akurat");
      }
      //Buat Peta
      var x = document.createElement("IMG");
      x.setAttribute("id", "lokasi-img");
      x.setAttribute("src", "https://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:LOKASI%7C" + position.coords.latitude + "," + position.coords.longitude + "&zoom=15&size=400x400&maptype=roadmap&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A");
      document.getElementById("lokasi").appendChild(x);
      //Input Nilai Maps
      document.getElementById("lat-location").innerHTML = position.coords.latitude;
      document.getElementById("lng-location").innerHTML = position.coords.longitude;
      document.getElementById("lat-input").value = position.coords.latitude;
      document.getElementById("lng-input").value = position.coords.longitude;

    }
  </script>
</body>
</html>