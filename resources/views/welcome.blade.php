<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            td{
                padding:3px;
            }
        </style>
    </head>
    <body class="container">
        <form action="{{ route('try') }}" method="get">
        <div class="col-md-12">
            <div class="pull-left text-left">
                <img src="{{ asset('images/a.jpg') }}" alt="" style="max-width: 90px; border-radius: 20px">
            </div>
            <div class="pull-right text-right">
                <label for="">TransciptDOC</label>
                <p>
                    Jalan Belakang RSU III. 11a, Klojen <br>
                    Malang, Jawa Timur 8787 <br>
                    Indonesia
                </p>
            </div>
        </div>
        <div class="col-md-12 pull-left">
            <hr>
            <div class="pull-left text-left col-md-4">
                <h6>Bill To :</h6>
                <label><input type="text" class="form form-control" name="nama"></label><br>
                <input type="text" class="form-control" placeholder="alamat" name="alamat">
            </div>
            <div class="col-md-3 pull-right" style="background:white">
                <table>
                    <tr>
                        <td><label for="">Invoice Number</label></td>
                        <td><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                        <td> : 88</td>
                    </tr>
                    <tr>
                        <td><label for="">Invoice Date</label></td>
                        <td><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                        <td> : <input type="date" class="form-control" name="invdate"></td>
                    </tr>
                    <tr>
                        <td><label for="">Due Date</label></td>
                        <td><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                        <td> : <input type="date" class="form-control" name="invdue"></td>
                    </tr>
                    <tr>
                        <td><label for="">Amount Due</label></td>
                        <td><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                        <td> : <span class="hasilsemua"></span></td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <table style="width: 100%">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                <tr class="loop">
                    <td>
                        <input type="text" class="form form-control" name="produk[]">
                    </td>
                    <td>
                        <input type="number" name="qty[]" id="qty[]" class="qty form-control" required>
                    </td>
                    <td>
                        <input type="number" name="price[]" id="price[]" class="price form-control" required>
                    </td>
                    <td>
                        <label class="hasil">Rp..</label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-group col-md-2">
          <button class="btn btn-primary" id="addmc"><i class="fa fa-plus"></i>+</button>
          <button type="button" class="btn btn-danger" id="hapus">x<i class="fa fa-trash"></i></button>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-3 pull-right" style="background:white">
            <table>
                <tr>
                    <td><label for="">Total</label></td>
                    <td><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td> : <span class="hasilsemua"></span></td>
                </tr>
                <tr>
                    <td><label for="">Total Paid</label></td>
                    <td><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td> : Rp0</td>
                </tr>
            </table>
            <br>
            <div class="pull-right">
                <h4>Amount Due</h4>
                <h1><span class="hasilsemua"></span></h1>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary btn-block" type="submit">inv</button>
            <br>
            <br>
            <br>
        </div>
    </form>
    </body>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script>
        function rupiah(rp){
            var bilangan = rp;

            var number_string = bilangan.toString(),
            sisa    = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
            }

            // Cetak hasil
            return 'Rp'+rupiah; // Hasil: 23.456.789
        }
        $(document).ready(function(){
            // $("input").each(function() {
            //     var that = this; // fix a reference to the <input> element selected
            //     var up=$(this).parent();
            //     $(this).keyup(function(){
            //         var qty=up.find('.price').val();
            //         var price=up.find('.qty').val();
            //         // console.log(up);
            //         console.log($(this).map(function(){
            //     alert(qty);
            // }).get().join());
            //                            // call() redefines what "this" means
            //                            // so newSum() sees 'this' as the <input> element
            //     });
            // });
            $(".loop td input").keyup(multInputs);

            function multInputs() {
               var mult = 0;
               // for each row:
               $("tr.loop").each(function () {

                   // get the values from this row:
                   var $val1 = $('.qty', this).val();
                   var $val2 = $('.price', this).val();
                   var $total = ($val1 * 1) * ($val2 * 1);
                   mult += $total;
                   $total=rupiah($total);
                   $('.hasil',this).text($total);
               });
               mult=rupiah(mult);
               $(".hasilsemua").text(mult);
           }
        });
        $(document).ready(function(){
            var i=0;
            $("#addmc").click(function() {
                $('.loop:last').clone(true).insertAfter('.loop:last'); 
                // $('.loop:last > td').clone(true).find("input").val("");
                i++;
                return false;
            });
            $("#hapus").click(function(){
                if(i>0){
                    $('.loop:last').remove();
                    i--;
                }
            });
        });
    </script>
</html>
