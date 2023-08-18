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
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pengurus</h4>
          </div>
          <div class="card-body">
            {{ $userCount }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-school"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Divisi</h4>
          </div>
          <div class="card-body">
            {{ $divisions->count() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-book-open"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Proker</h4>
          </div>
          <div class="card-body">
            {{ $tasks->count() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-book-reader"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Kepanitian</h4>
          </div>
          <div class="card-body">
            {{ $committees->count() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Statistik Keseluruhan</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart3"></canvas>
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
            @forelse ($users as $user)
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/{{ $user->profile }}" alt="avatar">
                <div class="media-body">
                  <div class="float-right text-primary" id="time-{{ $user->id }}"></div>
                  <div class="media-title">{{ $user->name }}</div>
                  <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.</span>
                </div>
              </li>
            @empty
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                <div class="media-body">
                  <div class="media-title">No Data</div>
                </div>
              </li>
            @endforelse
            
          </ul>
          {{-- <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">
              View All
            </a>
          </div> --}}
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
@push('script')
<script>
  var ctx = document.getElementById("myChart3").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          {{ $users->count() }},
          {{ $divisions->count() }},
          {{ $tasks->count() }},
          {{ $committees->count() }},
        ],
        backgroundColor: [
          '#63ed7a',
          '#ffa426',
          '#fc544b',
          '#6777ef',
        ],
        label: 'Dataset 1'
      }],
      labels: [
        'Pengurus',
        'Divisi',
        'Proker',
        'Kepanitiaan'
      ],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });

  // user timeline
  @foreach($users as $user)
  let time_login{{ $loop->iteration }} = document.querySelector('#time-{{ $user->id }}')
  let date_{{ $loop->iteration }} = moment("{{ $user->time_login }}").startOf('minute')
  time_login{{ $loop->iteration }}.textContent = date_{{ $loop->iteration }}.fromNow()
  @endforeach
</script>
@endpush