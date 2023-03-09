@extends('component.admin.sidenavbar')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <div class="ms-auto">
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          @if (Level() == 'admin')
                          <div>
                            <p class="statistics-title">Members</p>
                            <h3 class="rate-percentage">{{ countM() }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Products</p>
                            <h3 class="rate-percentage">{{ countP() }}</h3>
                          </div>
                              
                          <div>
                            <p class="statistics-title">Categories</p>
                            <h3 class="rate-percentage">{{ countC() }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">seller</p>
                            <h3 class="rate-percentage">{{ countT() }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Member Request</p>
                            <h3 class="rate-percentage">{{ CountMR() }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">seller request</p>
                            <h3 class="rate-percentage">{{ CountPR() }}</h3>
                          </div>
                          @else
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Pendapatan</p>
                            <h3 class="rate-percentage">{{ CountPR() }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Products</p>
                            <h3 class="rate-percentage">{{ CountPR() }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Likes</p>
                            <h3 class="rate-percentage">{{ CountPR() }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Sold Out</p>
                            <h3 class="rate-percentage">{{ CountPR() }}</h3>
                          </div>
                          @endif
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Market Overview</h4>
                                   <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                  </div>
                                  <div>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Settings</h6>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$36,2531.00</h2><h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4></div>
                                  <div class="me-3"><div id="marketing-overview-legend"></div></div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  {{-- <canvas id="marketingOverview"></canvas> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @if (Level() == 'admin')
                       <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Member Add Requests</h4>
                                   <p class="card-subtitle card-subtitle-dash">You have {{ count($member) }} new requests</p>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table" id="myTable">
                                    <thead>
                                      <tr>
                                        <th>Nama</th>
                                        <th>No Induk</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($member as $item)
                                      <tr>
                                        <td>
                                          <div class="d-flex align-items-center">
                                            @if ($item['foto'] == NULL)
                                            <img src="{{ asset('assets/images/guest.jpeg') }}" alt="">
                                            @else
                                            <img src="{{ asset('storage/'.$item['foto']) }}" alt="">
                                            @endif
                                            <div>
                                              <h6>{{ $item['nama'] }}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ $item['no_induk'] }}</h6>
                                          <p>company type</p>
                                        </td>
                                        <?php
                                                if ($item['no_induk'] == NULL) {
                                                    $j_induk = 0;
                                                }else{
                                                    $j_induk = 1;
                                                }
                                                if($item['nama'] == NULL){
                                                    $j_nama = 0;
                                                }else{
                                                    $j_nama = 1;
                                                }
                                                if($item['alamat'] == NULL){
                                                    $j_alamat = 0;
                                                }else{
                                                    $j_alamat = 1;
                                                }
                                                if($item['no_hp'] == NULL){
                                                    $jno_hp = 0;
                                                }else{
                                                    $jno_hp = 1;
                                                }
                                                if($item['jk'] == NULL){
                                                    $j_jk = 0;
                                                }else{
                                                    $j_jk = 1;
                                                }
                                                if($item['foto'] == NULL){
                                                    $j_foto = 0;
                                                }else{
                                                    $j_foto = 1;
                                                }
                                                $jumlah = ($j_induk + $j_nama + $j_alamat + $jno_hp + $j_jk + $j_foto);
                                                if ($jumlah == 0) {
                                                    $progres = 0;
                                                }elseif ($jumlah == 1) {
                                                    $progres = 16;
                                                }
                                                elseif ($jumlah == 2) {
                                                    $progres = 33;
                                                }elseif($jumlah == 3){
                                                    $progres = 50;
                                                }elseif ($jumlah == 4) {
                                                    $progres = 66;
                                                }elseif ($jumlah == 5) {
                                                    $progres = 82;
                                                }elseif ($jumlah == 6) {
                                                    $progres = 100;
                                                }
                                        ?>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success"><?= $progres ?>%</p>
                                              <p><?= $jumlah ?>/6</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progres ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        @if ($progres == 100)
                                        <td><div class="badge bg-warning">{{ ($item['status_aktif'] == '0')?'Pending':'Success Activasi' }}</div></td>
                                            @else
                                            <td><div class="badge bg-secondary">In progress</div></td>
                                            @endif
                                            <td>
                                              <div class="d-flex align-items-center">
                                                <form action="/member/request/edit/{{ $item['id'] }}" method="post">
                                                  @csrf
                                                  <button type="submit" class="border-0 bg-transparent" {{ ($progres == 100)?'':'disabled' }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" color="{{ ($progres == 100)?'green':'gray' }}" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                      <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                      <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                    </svg>
                                                  </button>
                                            </form>
                                              <a href="member/delete/{{ $item['id'] }}" class="p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                              </a>
                                            </div>
                                            </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">Type By Amount</h4>
                                    </div>
                                    <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                    <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Leave Report</h4>
                                      </div>
                                      <div>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <h6 class="dropdown-header">week Wise</h6>
                                            <a class="dropdown-item" href="#">Year Wise</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <canvas id="leaveReport"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @if (Level() == 'admin')
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash"></h4>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="{{ asset('dashboard/images/faces/face1.jpg') }}" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="{{ asset('dashboard/images/faces/face2.jpg')  }}" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="{{ asset('dashboard/images/faces/face3.jpg') }}" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="{{ asset('dashboard/images/faces/face4.jpg') }}" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                            <small class="text-muted mb-0">162543</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="{{ asset('dashboard/images/faces/face5.jpg') }}" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                            <small class="text-muted mb-0">Alaska, USA</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          1h ago
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
