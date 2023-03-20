<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INV</title>
    @include('component.member.bootstrap.css')
    <style>
          .body-main {
        background: #ffffff;
        border-bottom: 15px solid #1E1F23;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative ;
        box-shadow: 0 1px 21px #808080;
        font-size:10px;
        
        
        
    }

    .main thead {
		background: #1E1F23;
        color: #fff;
		}
    .img{
        height: 100px;}
    h1{
       text-align: center;
    }

    
    </style>
</head>
<body>
  <div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-3 body-main">
              <div class="col-md-12">
                 <div class="row">
                      <div class="col-md-4">
                          <img class="img" alt="Invoce Template" src="../dashboard/images/logoypc.png" />
                      </div>
                      <div class="col-md-8 text-right">
                          <h4 style="color: #F81D2D;"><strong>YPC Store</strong></h4>
                          <p>{{ $inv->member->alamat }}</p>
                          <p>{{ $inv->member->nama }}</p>
                      </div>
                  </div>
                  <br />
                  <div class="row">
                      <div class="col-md-12 text-center">
                          <h2>INVOICE</h2>
                          <h5>{{ $inv->kode_inv }}</h5>
                      </div>
                  </div>
                  <br />
                  <div>
                      <table class="table">
                          <thead>
                              <tr>
                                  <th><h5>Description</h5></th>
                                  <th><h5>Amount</h5></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="col-md-9">{{ $inv->produk->nmproduk }}</td>
                                  <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ $inv->harga }} </td>
                              </tr>
                              <tr>
                                  <td class="text-right">
                                  <p>
                                      <strong>Qty: </strong>
                                  </p>
                                <p>
                                      <strong>Jumlah: </strong>
                                  </p>
                                </td>
                                  <td>
                    <p>
                                      <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ $inv->jmlpesanan }}  </strong>
                                  </p>
                    <p>
                                      <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ $inv->harga*$inv->jmlpesanan }}</strong>
                                  </p>
                    </td>
                              </tr>
                              <tr style="color: #F81D2D;">
                                  <td class="text-right"><h4><strong>Total:</strong></h4></td>
                                  <td class="text-left"><h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{ $inv->harga*$inv->jmlpesanan }} </strong></h4></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div>
                      <div class="col-md-12">
                          <p><b>Tanggal :</b>{{ $inv->tanggalpesanan }}</p>
                          <br />
                          <p><b>Signature</b></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
<script>
  window.print();
</script>
</body>
</html>
