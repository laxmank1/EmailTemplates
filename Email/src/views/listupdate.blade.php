@include('headers::header')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Email Template</li>
      </ol>
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
    <h2></h2>
    </div>
    <div class="pull-right">
    <a class="btn btn-success" href="{{ route('add') }}"> Add New Email Template</a>
    </div>
    </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
      <!-- Example DataTables Card-->

  <div class="container">

  <table id="emailTemplate" class="table table-hover table-condensed" style="width:100%">

    <thead class="thead-inverse">

        <tr>

            <th> Template Name</th>

            <th>Subject</th>

            <th>Created</th>
             <th>Actions  </th>

        </tr>

    </thead>
    <tfoot class="thead-inverse">
    <tr>
    <th> Template Name</th>
    <th>Subject</th>
    <th>Created</th>
    <th>Actions</th>

    </tr>
    </tfoot>

  </table>

</div>


</div>
    @include('footers::footer')

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

      <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

<script type="text/javascript">

$(document).ready(function() {

    oTable = $('#emailTemplate').DataTable({

        "processing": true,

        "serverSide": true,
        "pageLength": 5,

        "ajax": "{{ route('datatable.getposts') }}",

        "columns": [


            {data: 'name', name: 'name'},

            {data: 'subject', name: 'subject'},

            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}


        ],
       
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]


    });

});

</script>