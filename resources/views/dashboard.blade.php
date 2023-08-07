@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pengurus</h4>
          </div>
          <div class="card-body">
            10
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Divisi</h4>
          </div>
          <div class="card-body">
            42
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Proker</h4>
          </div>
          <div class="card-body">
            1,201
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Kepanitian</h4>
          </div>
          <div class="card-body">
            47
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Statistics</h4>
          <div class="card-header-action">
            <div class="btn-group">
              <a href="#" class="btn btn-primary">Week</a>
              <a href="#" class="btn">Month</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart" height="182"></canvas>
          <div class="statistic-details mt-sm-4">
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
              <div class="detail-value">$243</div>
              <div class="detail-name">Today's Sales</div>
            </div>
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
              <div class="detail-value">$2,902</div>
              <div class="detail-name">This Week's Sales</div>
            </div>
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
              <div class="detail-value">$12,821</div>
              <div class="detail-name">This Month's Sales</div>
            </div>
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
              <div class="detail-value">$92,142</div>
              <div class="detail-name">This Year's Sales</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Recent Activities</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
              <div class="media-body">
                <div class="float-right text-primary">Now</div>
                <div class="media-title">Farhan A Mujib</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png" alt="avatar">
              <div class="media-body">
                <div class="float-right">12m</div>
                <div class="media-title">Ujang Maman</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-3.png" alt="avatar">
              <div class="media-body">
                <div class="float-right">17m</div>
                <div class="media-title">Rizal Fakhri</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-4.png" alt="avatar">
              <div class="media-body">
                <div class="float-right">21m</div>
                <div class="media-title">Alfa Zulkarnain</div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
          </ul>
          <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">
              View All
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-12">
      <div class="card mt-sm-5 mt-md-0">
        <div class="card-header">
          <h4>Visitors</h4>
        </div>
        <div class="card-body">
          <div id="visitorMap"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Authors</h4>
        </div>
        <div class="card-body">
          <div class="row pb-2">
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
              <div class="avatar-item mb-0">
                <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
              </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
              <div class="avatar-item mb-0">
                <img alt="image" src="../assets/img/avatar/avatar-4.png" class="img-fluid" data-toggle="tooltip" title="Egi Ferdian">
                <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
              </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
              <div class="avatar-item mb-0">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="img-fluid" data-toggle="tooltip" title="Jaka Ramadhan">
                <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
              </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
              <div class="avatar-item mb-0">
                <img alt="image" src="../assets/img/avatar/avatar-2.png" class="img-fluid" data-toggle="tooltip" title="Ryan">
                <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-5 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4>Referral URL</h4>
        </div>
        <div class="card-body">
          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">2,100</div>
            <div class="font-weight-bold mb-1">Google</div>
            <div class="progress" data-height="3">
              <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
  
          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">1,880</div>
            <div class="font-weight-bold mb-1">Facebook</div>
            <div class="progress" data-height="3">
              <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
  
          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">473</div>
            <div class="font-weight-bold mb-1">Kodinger</div>
            <div class="progress" data-height="3">
              <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
  
          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">418</div>
            <div class="font-weight-bold mb-1">Multinity</div>
            <div class="progress" data-height="3">
              <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Latest Posts</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-primary">View All</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Laravel 5 Tutorial - Installation
                    <div class="table-links">
                      in <a href="#">Web Development</a>
                      <div class="bullet"></div>
                      <a href="#">View</a>
                    </div>
                  </td>
                  <td>
                    <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    Laravel 5 Tutorial - Migration
                    <div class="table-links">
                      in <a href="#">Web Development</a>
                      <div class="bullet"></div>
                      <a href="#">View</a>
                    </div>
                  </td>
                  <td>
                    <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    Laravel 5 Tutorial - Deploy
                    <div class="table-links">
                      in <a href="#">Web Development</a>
                      <div class="bullet"></div>
                      <a href="#">View</a>
                    </div>
                  </td>
                  <td>
                    <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    Laravel 5 Tutorial - Closing
                    <div class="table-links">
                      in <a href="#">Web Development</a>
                      <div class="bullet"></div>
                      <a href="#">View</a>
                    </div>
                  </td>
                  <td>
                    <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection