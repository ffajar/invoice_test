<style>

    .invoice-box {
  max-width: 800px;
  margin: auto;
  padding: 30px;
  border: 1px solid #eee;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
  font-size: 16px;
  line-height: 24px;
  font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
  color: #555;
background-image: linear-gradient(to bottom right, #ffb61a, #FFC448);
}

.invoice-box table {
  width: 100%;
  line-height: inherit;
  text-align: left;
}

.invoice-box table td {
  padding: 5px;
  vertical-align: top;
}

.invoice-box table tr td:nth-child(n + 2) {
  text-align: right;
}

.invoice-box table tr.top table td {
  padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
  font-size: 45px;
  line-height: 45px;
  color: #333;
}

.invoice-box table tr.information table td {
  padding-bottom: 40px;
}

.invoice-box table tr.heading td {
  background: #eee;
  border-bottom: 1px solid #ddd;
  font-weight: bold;
}

.invoice-box table tr.details td {
  padding-bottom: 20px;
}

.invoice-box table tr.item td {
  border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
  border-bottom: none;
}

.invoice-box table tr.item input {
  padding-left: 5px;
}

.invoice-box table tr.item td:first-child input {
  margin-left: -5px;
  width: 100%;
}

.invoice-box table tr.total td:nth-child(2) {
  border-top: 2px solid #eee;
  font-weight: bold;
}

.invoice-box input[type="number"] {
  width: 60px;
}

@media only screen and (max-width: 600px) {
  .invoice-box table tr.top table td {
    width: 100%;
    display: block;
    text-align: center;
  }

  .invoice-box table tr.information table td {
    width: 100%;
    display: block;
    text-align: center;
  }
}

/** RTL **/
.rtl {
  direction: rtl;
  font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial,
    sans-serif;
}

.rtl table {
  text-align: right;
}

.rtl table tr td:nth-child(2) {
  text-align: left;
}

</style>
<div class="invoice-box">
  <table cellpadding="0" cellspacing="0">
    <tr class="top">
      <td colspan="4">
        <table>
          <tr>
            <td class="title">
              <img src="{{ asset('images/a.jpg') }}" style="max-width:90px;">
            </td>

            <td>
              <label for="">TransciptDOC</label><br> Jalan Belakang RSU III. 11a, Klojen , Malang Jawa Timur<br> Indonesia <br> Due: February 1, 2015
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <tr class="information">
      <td colspan="4">
        <table>
          <tr>
            <td>
              Bill To<br> {{ $data->nama }}<br> {{ $data->alamat }}
            </td>

            <td>
              Invoice Number : 90879.<br> Invoice Date : {{ $data->invdate }}<br> Due Due : {{ $data->invdue }} <br> Amount Date : {{ $total }}
            </td>
          </tr>
        </table>
      </td>
    </tr>


    <tr class="heading">
      <td>Produk</td>
      <td>Qty</td>
      <td>Price</td>
      <td>Total</td>
    </tr>

    <tr class="item" v-for="item in items">
      @for($i = 0; $i < count($data->qty); $i++)
        <td>
            <label for="">{{ $data->produk[$i] }}</label>
        </td>
        <td>
            <label for="">{{ $data->qty[$i] }}</label>
        </td>
        <td>
            <label for="">{{ $data->price[$i] }}</label>
        </td>
        <td>
            <label class="hasil">Rp{{ number_format($data->qty[$i]*$data->price[$i]) }}</label>
        </td>
      @endfor
    </tr>

    <tr class="total">
      <td colspan="3"></td>
      <td>Total: {{ $total }}</td>
    </tr>
  </table>
</div>
<script src="" type="text/javascript" charset="utf-8" async defer>
	window.print();
</script>