@extends('layouts.app')

@section('style')
<!-- CSS -->
<!-- Select2 -->
<link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/forms.css') }}" rel="stylesheet" />
<!-- bootstrap-daterangepicker -->
<link href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<!-- Document styling -->
<link href="{{ asset('/css/loe.css') }}" rel="stylesheet" />
@stop

@section('scriptsrc')
<!-- JS -->
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>
<!-- Bootbox -->
<script src="{{ asset('/plugins/bootbox/bootbox.min.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('/plugins/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- Table Excel -->
<script src="{{ asset('/plugins/sheetjs/dist/xlsx.core.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/FileSaver/FileSaver.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/TableExport/tableExport.min.js') }}" type="text/javascript"></script>
<!-- For details: https://github.com/hhurz/tableExport.jquery.plugin -->
@stop

@section('content')
<!-- Window -->
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <!-- Window title -->
      <div class="x_title">
        <h2>
          {{$customer->name}}
          <small>{{$project->project_name}}</small>
          
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- Window title -->

      <!-- Window content -->
      <div class="x_content">
        <!-- LoE -->

        <!-- Table -->
          <div class="row">
            <div class="col-md-1">
              <div class="dropdown">
                <button id="options_loe" class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                <span class="glyphicon glyphicon-cog"></span><i class="fa fa-sort-desc"></i>
                </button>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Add column</li>
                  <li><a class="dropdown-selection site_create" href="#">Calculation</a></li>
                  <li><a class="dropdown-selection cons_create" href="#">Consulting type</a></li>
                  <li class="dropdown-header">Report</li>
                  <li><a class="dropdown-selection loe_history" href="#">History</a></li>
                  <li><a class="dropdown-selection loe_table_to_excel" href="#">Export to Excel</a></li>
                  <li class="dropdown-header">Tools</li>
                  <li><a class="dropdown-selection hide_columns" href="#">Hide Columns</a></li>
                  @if (Auth::user()->can('projectLoe-signoff'))
                  <li><a class="dropdown-selection loe_mass_signoff" href="#">Mass Signoff</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          <div id="table_loader" class="row">
            <div class="col-sm">
              <img src="{{ asset("/img/loading.gif") }}" width="100" height="100">
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%" id="LoeTable"></table>
            </div>
          </div>
        <!-- Table -->

        <!-- Loe hide Modal -->
        <div class="modal fade" id="modal_loe_hidecol" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="display:table;">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="modal_loe_hidecol_title">Hide columns</h4>
                  </div>
                  <!-- Modal Header -->
                
                  <!-- Modal Body -->
                  <div class="modal-body">
                    <form id="modal_loe_hidecol_form" role="form" method="POST" action="">
                    </form>
                  </div>
                    
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- Loe hide Modal -->

        <!-- History Modal -->
        <div class="modal fade" id="modal_loe_history" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="display:table;">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="modal_loe_history_title">History</h4>
                  </div>
                  <!-- Modal Header -->
                
                  <!-- Modal Body -->
                  <div class="modal-body">
                    <table class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="800px" id="LoeHistoryTable">
                    </table>
                  </div>
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="loe_history_excel" class="btn btn-info">Excel</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- History Modal -->

        <!-- Signoff Modal -->
        <div class="modal fade" id="modal_loe_signoff" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="display:table;">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="modal_loe_signoff_title">Mass signoff</h4>
                  </div>
                  <!-- Modal Header -->
                
                  <!-- Modal Body -->
                  <div class="modal-body">
                    <form id="modal_loe_signoff_form" role="form" method="POST" action="">
                      <div id="modal_loe_signoff_formgroup_domain" class="form-group">
                        <label  class="control-label" for="modal_loe_signoff_form_domain">Domain</label>
                        <select class="form-control select2" style="width: 100%;" id="modal_loe_signoff_form_domain" data-placeholder="Select a domain">
                        </select>
                        <span id="modal_loe_signoff_form_domain_error" class="help-block"></span>
                      </div>
                      <div class="form-group">
                          <div id="modal_loe_signoff_form_hidden"></div>
                      </div>
                    </form>
                  </div>
                    
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="modal_loe_signoff_create_update_button" class="btn btn-success">Signoff</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- Signoff Modal -->

        <!-- Site Modal -->
        <div class="modal fade" id="modal_loe_site" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="display:table;">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="modal_loe_site_title">Edit Calculation</h4>
                  </div>
                  <!-- Modal Header -->
                
                  <!-- Modal Body -->
                  <div class="modal-body">
                    <form id="modal_loe_site_form" role="form" method="POST" action="">
                      <div id="modal_loe_site_formgroup_name" class="form-group">
                          <label  class="control-label" for="modal_loe_site_form_name">Name</label>
                          <input type="text" id="modal_loe_site_form_name" class="form-control" placeholder="Name"></input>
                          <span id="modal_loe_site_form_name_error" class="help-block"></span>
                      </div>
                      <div class="form-group">
                          <div id="modal_loe_site_form_hidden"></div>
                      </div>
                    </form>
                  </div>
                    
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="modal_loe_site_create_update_button" class="btn btn-success">Update</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- Site Modal -->

        <!-- Cons Modal -->
        <div class="modal fade" id="modal_loe_cons" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="display:table;">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="modal_loe_cons_title">Edit Consultant Type</h4>
                  </div>
                  <!-- Modal Header -->
                
                  <!-- Modal Body -->
                  <div class="modal-body">
                    <form id="modal_loe_cons_form" role="form" method="POST" action="">
                      <div id="modal_loe_cons_formgroup_name" class="form-group">
                          <label  class="control-label" for="modal_loe_cons_form_name">Name</label>
                          <input type="text" id="modal_loe_cons_form_name" class="form-control" placeholder="Name"></input>
                          <span id="modal_loe_cons_form_name_error" class="help-block"></span>
                      </div>
                      <div id="modal_loe_cons_formgroup_country" class="form-group">
                        <label  class="control-label" for="modal_loe_cons_form_country">Country</label>
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button type="button" id="modal_loe_cons_clear_country_button" class="btn btn-info">Clear</button>
                          </span>
                          <select class="form-control select2" style="width: 100%;" id="modal_loe_cons_form_country" data-placeholder="Select a country">
                            <option value="" ></option>
                            @foreach(config('countries.country') as $key => $value)
                            <option value="{{ $key }}">
                              {{ $value }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                        <span id="modal_loe_cons_form_country_error" class="help-block"></span>
                      </div>
                      <div id="modal_loe_cons_formgroup_seniority" class="form-group">
                        <label  class="control-label" for="modal_loe_cons_form_seniority">Seniority</label>
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button type="button" id="modal_loe_cons_clear_seniority_button" class="btn btn-info">Clear</button>
                          </span>
                          <select class="form-control select2" style="width: 100%;" id="modal_loe_cons_form_seniority" data-placeholder="Select a seniority">
                            <option value="" ></option>
                            @foreach(config('select.loe_type') as $key => $value)
                            <option value="{{ $key }}">
                              {{ $value }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                        <span id="modal_loe_cons_form_seniority_error" class="help-block"></span>
                      </div>
                      <div class="form-group">
                          <div id="modal_loe_cons_form_hidden"></div>
                      </div>
                    </form>
                  </div>
                    
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="modal_loe_cons_create_update_button" class="btn btn-success">Update</button>
                  </div>
                </div>
            </div>
        </div>
        <!-- Cons Modal -->

        <!-- LoE -->

      </div>
      <!-- Window content -->
    </div>
  </div>
</div>
<!-- Window -->
@stop

@section('script')
<script>
$(document).ready(function() {
  //region Init
  // Ajax setup needed in case there is an update
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // This code will make any modal window draggable
  $(".modal-header").on("mousedown", function(mousedownEvt) {
    var $draggable = $(this);
    var x = mousedownEvt.pageX - $draggable.offset().left,
        y = mousedownEvt.pageY - $draggable.offset().top;
    $("body").on("mousemove.draggable", function(mousemoveEvt) {
        $draggable.closest(".modal-dialog").offset({
            "left": mousemoveEvt.pageX - x,
            "top": mousemoveEvt.pageY - y
        });
    });
    $("body").one("mouseup", function() {
        $("body").off("mousemove.draggable");
    });
    $draggable.closest(".modal").one("bs.modal.hide", function() {
        $("body").off("mousemove.draggable");
    });
  });
  //endregion

  //region Loe
    //region LoeInit
    var loe_data;
    var editable_old_value;
    var project_id = {{ $project->id }};
    // Now we need to check if there is colhide in cookies...
    var load_loe_hide_cookie = Cookies.get("loe_hide_columns");
    
    if (typeof load_loe_hide_cookie !== 'undefined') {
      var colhide = JSON.parse(load_loe_hide_cookie);
    } else {
      var colhide = [
        {'name':'main_phase','hide':false},
        {'name':'secondary_phase','hide':false},
        {'name':'domain','hide':false},
        {'name':'description','hide':false},
        {'name':'option','hide':false},
        {'name':'assumption','hide':false},
        {'name':'site','hide':false},
        {'name':'quantity','hide':false},
        {'name':'loe_per_unit','hide':false},
        {'name':'formula','hide':false},
        {'name':'recurrent','hide':false},
        {'name':'start_date','hide':false},
        {'name':'end_date','hide':false},
        {'name':'consulting','hide':false},
        {'name':'total_loe','hide':false},
        {'name':'total_cost','hide':false},
        {'name':'total_price','hide':false},
        {'name':'margin','hide':false}
      ];
    }

    // Init select2 boxes in the modal
    $("#modal_loe_cons_form_country").select2({
        allowClear: true
    });
    $("#modal_loe_cons_form_seniority").select2({
        allowClear: true
    });

    //endregion

    //region Show Loe
    function getBusinessDatesCount(start, end) {
      var startDate = new Date(start);
      var endDate = new Date(end);
      var count = 0;
      var curDate = startDate;
      while (curDate <= endDate) {
          var dayOfWeek = curDate.getDay();
          if(!((dayOfWeek == 6) || (dayOfWeek == 0)))
            count++;
          curDate.setDate(curDate.getDate() + 1);
      }
      return count;
    }

    function td_no_null(item,end='',colname='',myclass='',cr = false) {
      if (item != null && item != '') {
        if (cr) {
          item = item.replace(/\r?\n|\r/g,'<br>');
          //console.log(item);
        }
        return '<td data-colname="'+colname+'" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="'+myclass+'" @endcan>'+item+end+'</td>';
      } else {
        return '<td data-colname="'+colname+'" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="'+myclass+'" @endcan></td>';
      }
    }

    function fill_total(){
      var grand_total_loe=0;
      var grand_total_cost=0;
      var grand_total_price=0;
      var tr;
      $('#LoeTable tbody tr').each(function(){
        tr = $(this);

        //region Total LoE
        quantity = tr.find('td[data-colname=quantity]').html();
        loe_per_unit = tr.find('td[data-colname=loe_per_unit]').html();
        total_loe = quantity * loe_per_unit;

        tr.find('td[data-colname=total_loe]').html(total_loe);

        grand_total_loe += total_loe;
        //endregion

        //region cost/price/margin
        //Now we need to do this only if there are consulting columns
        if (loe_data.col.cons.length > 0) {
          total_cost = 0;
          total_price = 0;
          loe_data.col.cons.forEach(function(item){
            percent = tr.find('td[data-colname=consulting][data-colconsname='+item.name+'][data-colsubname=percent]').html();
            md = (total_loe * percent)/100;
            tr.find('td[data-colname=consulting][data-colconsname='+item.name+'][data-colsubname=md]').html(md);
            cost = tr.find('td[data-colname=consulting][data-colconsname='+item.name+'][data-colsubname=cost]').html();
            price = tr.find('td[data-colname=consulting][data-colconsname='+item.name+'][data-colsubname=price]').html();
            total_cost += md*cost;
            total_price += md*price;
          });

          if (total_cost == 0) {
            margin = 0;
          } else {
            margin = 100*(total_price-total_cost)/total_cost;
          }

          tr.find('td[data-colname=total_cost]').html(total_cost);
          tr.find('td[data-colname=total_price]').html(total_price);
          tr.find('td[data-colname=margin]').html(margin.toFixed(2));

          grand_total_cost += total_cost;
          grand_total_price += total_price;
        }
        //endregion
      });

      $('#LoeTable tfoot tr td[data-colname=total_loe]').html(grand_total_loe);
      $('#LoeTable tfoot tr td[data-colname=total_cost]').html(grand_total_cost);
      $('#LoeTable tfoot tr td[data-colname=total_price]').html(grand_total_price);
      grand_margin = 100*(grand_total_price-grand_total_cost)/grand_total_cost;
      $('#LoeTable tfoot tr td[data-colname=margin]').html(grand_margin.toFixed(2));
    }

    function getLoeList(project_id){
      $('#LoeTable').empty();
      $.ajax({
        type: 'get',
        url: "{!! route('listFromProjectID','') !!}/"+project_id,
        dataType: 'json',
        beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                $('#table_loader').show();
            },
        success: function(data) {
          //console.log(data);
          loe_data = data;

          if (data.length != 0) {

            // Then we need to create the headers for the table
            html = '<thead>';
            //region HEADER
            //region First header
            html += '<tr>';
            html += '<th rowspan="3" data-colname="action" style="min-width:140px;" data-tableexport-display="none">'+'Action'+'</th>';
            html += '<th rowspan="3" data-colname="main_phase" style="min-width:150px;">'+'Main Phase'+'</th>';
            html += '<th rowspan="3" data-colname="secondary_phase" style="min-width:150px;">'+'Secondary Phase'+'</th>';
            html += '<th rowspan="3" data-colname="domain" style="min-width:150px;">'+'Domain'+'</th>';
            html += '<th rowspan="3" data-colname="description" style="min-width:250px;">'+'Description'+'</th>';
            html += '<th rowspan="3" data-colname="option" style="min-width:150px;">'+'Option'+'</th>';
            html += '<th rowspan="3" data-colname="assumption" style="min-width:250px;">'+'Assumption'+'</th>';
            if (data.col.site.length>0) {
              html += '<th data-colname="site" colspan="'+2*data.col.site.length+'">'+'Site calculation'+'</th>';
            }
            html += '<th data-colname="quantity" rowspan="3">'+'Quantity'+'</th>';
            html += '<th data-colname="loe_per_unit" rowspan="3">'+'LoE<br>(per unit)<br>in days'+'</th>';
            if (data.col.site.length>0) {
              html += '<th data-colname="formula" rowspan="3" style="min-width:150px;">'+'Formula'+'</th>';
            }
            
            html += '<th data-colname="recurrent" rowspan="3">'+'recurrent'+'</th>';
            html += '<th data-colname="start_date" rowspan="3" style="min-width:150px;">'+'Start date'+'</th>';
            html += '<th data-colname="end_date" rowspan="3" style="min-width:150px;">'+'End date'+'</th>';
            if (data.col.cons.length>0) {
              html += '<th data-colname="consulting" colspan="'+4*data.col.cons.length+'">'+'Consulting type'+'</th>';
            }
            
            html += '<th data-colname="total_loe" rowspan="3">'+'Total Loe'+'</th>';
            if (data.col.cons.length>0) {
              html += '<th data-colname="total_cost" rowspan="3">'+'Total Cost (€)'+'</th>';
              html += '<th data-colname="total_price" rowspan="3">'+'Total Price (€)'+'</th>';
              html += '<th data-colname="margin" rowspan="3">'+'Margin (%)'+'</th>';
            }
            html += '</tr>';
            //endregion
            //region Second header
            html += '<tr>';
            
            data.col.site.forEach(function(site){
              html += '<th data-colname="site" colspan="2">';
              html += '<span class="inline">'+site.name+'</span>';
              html += `<div class="dropdown sites_header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sort-desc"></i></a>
                        <ul class="dropdown-menu">
                          <li class="dropdown-header">Calculation</li>
                          <li><a class="dropdown-selection site_edit" data-name="`+site.name+`" href="#">Edit</a></li>
                          <li><a class="dropdown-selection site_delete" data-name="`+site.name+`" href="#">Delete</a></li>
                        </ul>
                      </div>`;
              html += '</th>';
            });
            
            data.col.cons.forEach(function(cons){
              html += '<th class="consultants_main_header" data-colname="consulting" colspan="4" style="min-width:180px;">'
              html += cons.name;
              html += '<br>';
              if (cons.seniority != null) {
                html += cons.seniority;
              } else {
                html += '';
              }
              html += '<br>';
              if (cons.location != null) {
                html += cons.location;
              } else {
                html += '';
              }
              html += `<div class="dropdown consultants_header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sort-desc"></i></a>
                        <ul class="dropdown-menu">
                          <li class="dropdown-header">Consulting type</li>
                          <li><a class="dropdown-selection cons_edit" data-name="`+cons.name+`" data-seniority="`+cons.seniority+`" data-location="`+cons.location+`" href="#">Edit</a></li>
                          <li><a class="dropdown-selection cons_delete" data-name="`+cons.name+`" data-seniority="`+cons.seniority+`" data-location="`+cons.location+`" href="#">Delete</a></li>
                        </ul>
                      </div>`;
              html += '</th>';
            });

            html += '</tr>';
            //endregion
            //region Third header
            html += '<tr>';
            
            data.col.site.forEach(function(site){
              html += '<th data-colname="site">Quantity</th>';
              html += '<th data-colname="site">LoE<br>(per unit)<br>in days</th>';
            });
            data.col.cons.forEach(function(cons){
              html += '<th data-colname="consulting" data-tableexport-xlsxformatid="49">%</th>';
              html += '<th data-colname="consulting">MD</th>';
              html += '<th data-colname="consulting">Cost (€)</th>';
              html += '<th data-colname="consulting">Price (€)</th>';
            });

            html += '</tr>';

            html += '</thead>';
            //endregion
            //endregion
            //region BODY
            html += '<tbody>';
            data.data.loe.forEach(function(row){

              html += '<tr data-id="'+row.id+'">';
              //region actions
              html += '<td data-colname="action" data-tableexport-display="none">';
              html += '<div class="btn-group btn-group-xs">';
              if ({{ Auth::user()->can('projectLoe-signoff') ? 'true' : 'false' }}){
                if (row.signoff_user_id != null) {
                  html += '<button type="button" data-id="'+row.id+'" class="buttonLoeSignoff btn"><span class="glyphicon glyphicon-ok"></span></button>';
                } else {
                  html += '<button type="button" data-id="'+row.id+'" class="buttonLoeSignoff btn btn-default"><span class="glyphicon glyphicon-remove"></span></button>';
                }
              };
              if ({{ Auth::user()->can('projectLoe-create') ? 'true' : 'false' }}){
                html += '<button type="button" data-id="'+row.id+'" class="buttonLoeCreate btn btn-info"><span class="glyphicon glyphicon-plus"></span></button>';
              };
              if ({{ Auth::user()->can('projectLoe-create') ? 'true' : 'false' }} || {{ Auth::user()->can('projectLoe-editAll') ? 'true' : 'false' }}){
                html += '<button type="button" data-id="'+row.id+'" class="buttonLoeDuplicate btn btn-warning"><span class="glyphicon glyphicon-duplicate"></span></button>';
              };
              if ({{ Auth::user()->can('projectLoe-delete') ? 'true' : 'false' }} || {{ Auth::user()->can('projectLoe-deleteAll') ? 'true' : 'false' }}){
                if (row.user_id == {{ Auth::user()->id }} || {{ Auth::user()->can('projectLoe-deleteAll') ? 'true' : 'false' }}) {
                  html += '<button type="button" data-id="'+row.id+'" data-first_line="'+row.first_line+'" class="buttonLoeDelete btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>';
                }
              };
              html += '</div>';

              html +='</td>';
              //endregion

              //region main text
              html += td_no_null(row.main_phase,'','main_phase','editable');
              html += td_no_null(row.secondary_phase,'','secondary_phase','editable');
              html += td_no_null(row.domain,'','domain','editable');
              html += td_no_null(row.description,'','description','editable',true);
              html += td_no_null(row.option,'','option','editable');
              html += td_no_null(row.assumption,'','assumption','editable',true);
              //endregion

              //region sites
              data.col.site.forEach(fill_site_data);
              function fill_site_data (site){
                
                if (data.data.site.hasOwnProperty(row.id) && data.data.site[row.id].hasOwnProperty(site.name)) {
                  //console.log(site.name+': '+data.data.site[row.id][site.name]['quantity']);
                  fill_quantity = data.data.site[row.id][site.name].quantity;
                  fill_loe_per_quantity = data.data.site[row.id][site.name].loe_per_quantity;
                } else {
                  //console.log(site.name+': -');
                  fill_quantity = 0;
                  fill_loe_per_quantity = 0;
                }
                html += '<td data-colname="site">'+fill_quantity+'</td>';
                html += '<td data-colname="site">'+fill_loe_per_quantity+'</td>';
              }
              //endregion

              //region quantity
              html += '<td data-colname="quantity" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="editable" @endcan>'+row.quantity+'</td>';
              html += '<td data-colname="loe_per_unit" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="editable" @endcan>'+row.loe_per_quantity+'</td>';
              //endregion

              //region formulas and recurrent
              if (data.col.site.length>0) {
                if (row.formula != null && row.formula != '') {
                  html +=  '<td class="formula_cell" data-colname="formula">';
                  html += `<div class="dropdown">
                        
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-check"></i></a>
                            
                            <ul class="dropdown-menu">
                              <li class="dropdown-header">Calculation</li>
                              <li class="formula_text" >`+row.formula+`</li>
                            </ul>
                          </div>`;
                    html +=  '</td>';
                } else {
                  html +=  '<td data-colname="formula"></td>';
                }
              }
              
              if (row.recurrent == 1) {
                html += '<td data-colname="recurrent" class="table_recurrent"><i class="fa fa-check"></i></td>';
              } else {
                html += '<td data-colname="recurrent"></td>';
              }
              
              html += td_no_null(row.start_date,'','start_date','editable');
              html += td_no_null(row.end_date,'','end_date','editable');
              //endregion

              //region consulting
              //Being in row.id, we will loop through the different consulting values
              for (const item in data.data.cons[row.id]) {
                consulting_id = data.data.cons[row.id][item].id;
                consulting_percent = data.data.cons[row.id][item].percentage;
                consulting_cost = data.data.cons[row.id][item].cost;
                consulting_price = data.data.cons[row.id][item].price;
                html += '<td data-id="'+consulting_id+'" data-colname="consulting" data-colconsname="'+item+'" data-colsubname="percent" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="editable" @endcan>'+consulting_percent.toFixed(2)+'</td>';
                html += '<td data-id="'+consulting_id+'" data-colname="consulting" data-colconsname="'+item+'" data-colsubname="md" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="editable" @endcan></td>';
                html += '<td data-id="'+consulting_id+'" data-colname="consulting" data-colconsname="'+item+'" data-colsubname="cost" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="editable" @endcan>'+consulting_cost.toFixed(1)+'</td>';
                html += '<td data-id="'+consulting_id+'" data-colname="consulting" data-colconsname="'+item+'" data-colsubname="price" @can('projectLoe-edit') contenteditable="true" @endcan @can('projectLoe-edit') class="editable" @endcan>'+consulting_price.toFixed(1)+'</td>';
              }
              //endregion

              //region total
              html += '<td data-colname="total_loe"></td>';

              if (data.col.cons.length>0) {
                html += '<td data-colname="total_cost"></td>';
                html += '<td data-colname="total_price"></td>';
                html += '<td data-colname="margin"></td>';
              }
              //endregion

              html += '</tr>';
            });
            html += '</tbody>';
            //endregion
            //region Footer
            html += '<tfoot>';
            
            html += '<td data-colname="action" data-tableexport-display="none"></td>';
            html += '<td data-colname="main_phase" class="grand_total">Grand Total</td>';
            html += '<td data-colname="secondary_phase"></td>';
            html += '<td data-colname="domain"></td>';
            html += '<td data-colname="description"></td>';
            html += '<td data-colname="option"></td>';
            html += '<td data-colname="assumption"></td>';
            // We need to remove one column named formula in case there is no calculation
            for (let index = 0; index < data.col.site.length; index++) {
              html += '<td data-colname="site"></td>';
              html += '<td data-colname="site"></td>';
            }
            html += '<td data-colname="quantity"></td>';
            html += '<td data-colname="loe_per_unit"></td>';
            if (data.col.site.length != 0) {
              html += '<td data-colname="formula"></td>';
            }
            html += '<td data-colname="recurrent"></td>';
            html += '<td data-colname="start_date"></td>';
            html += '<td data-colname="end_date"></td>';
            for (let index = 0; index < data.col.cons.length; index++) {
              html += '<td data-colname="consulting"></td>';
              html += '<td data-colname="consulting"></td>';
              html += '<td data-colname="consulting"></td>';
              html += '<td data-colname="consulting"></td>';
            }

            html += '<td data-colname="total_loe"></td>';

            if (data.col.cons.length>0) {
              html += '<td data-colname="total_cost"></td>';
              html += '<td data-colname="total_price"></td>';
              html += '<td data-colname="margin"></td>';
            }
            
            html += '</tfoot>';
            //endregion

            $('#LoeTable').prepend(html);

            fill_total();

            columns_hide();

          }

        },
        complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                $('#table_loader').hide();
            }
      });
    }

    getLoeList(project_id);
    //endregion

    //region Loe hide columns
    // LoE hide columns
    $(document).on('click', '.hide_columns', function () {
      $('#modal_loe_hidecol_form').empty();
      var html = '';
      colhide.forEach(hide_columns_choice);
      function hide_columns_choice (col,index){
        if (col.hide) {
          checked_val = 'checked';
        } else {
          checked_val = '';
        }
        html += '<div class="checkbox">';
        html += '<label><input type="checkbox" data-array_id="'+index+'" class="colhidecheckbox" value="" '+checked_val+'>'+col.name+'</label>';
        html += '</div>';
      }
      $('#modal_loe_hidecol_form').prepend(html);

      $('#modal_loe_hidecol').modal("show");
    });
    
    //jQuery listen for checkbox change
    $(document).on('change', '.colhidecheckbox', function () {
      key = $(this).data('array_id');
        if(this.checked) {
          colhide[key].hide = true;
        } else {
          colhide[key].hide = false;
        }
        Cookies.set("loe_hide_columns", JSON.stringify(colhide));
        columns_hide();
    });

    function columns_hide() {
      colhide.forEach(hide_columns);
      function hide_columns (col,index){
        if (col.hide) {
          $('[data-colname="'+col.name+'"]').each(function(){
            $(this).attr('data-tableexport-display','none');
            $(this).hide();
          });
        } else {
          $('[data-colname="'+col.name+'"]').each(function(){
            $(this).attr('data-tableexport-display','');
            $(this).show();
          });
        }
      }
    }

    //endregion

    //region history
    // HISTORY
    $(document).on('click', '.loe_history', function () {
      $('#LoeHistoryTable').empty();
      $.ajax({
        type: 'get',
        url: "{!! route('loeHistory','') !!}/"+{{ $project->id }},
        dataType: 'json',
        success: function(data) {
          

          if (data.length != 0) {
            console.log(data);
            // Then we need to create the headers for the table
            html = '<thead>';
            //region First header
            html += '<tr>';
            html += '<th style="min-width:140px;">'+'Date'+'</th>';
            html += '<th>'+'User'+'</th>';
            html += '<th>'+'DB ref#'+'</th>';
            html += '<th>'+'Main phase'+'</th>';
            html += '<th>'+'Secondary phase'+'</th>';
            html += '<th>'+'LoE Description'+'</th>';
            html += '<th>'+'History Description'+'</th>';
            html += '<th>'+'Field'+'</th>';
            html += '<th>'+'Old'+'</th>';
            html += '<th>'+'New'+'</th>';
            html += '</tr>';
            html += '</thead>';
            //endregion
            // Data filling
            function td_no_null_history(item,end='') {
              if (item != null && item != '') {
                return '<td>'+item+end+'</td>';
              } else {
                return '<td></td>';
              }
            }
            //region Body
            html += '<tbody>';
            data.forEach(function(row){

              html += '<tr>';
              created_at = new Date(row.created_at)
              html += td_no_null_history(created_at.toLocaleString());
              html += td_no_null_history(row.name);
              html += td_no_null_history(row.project_loe_id);
              html += td_no_null_history(row.main_phase);
              html += td_no_null_history(row.secondary_phase);
              html += td_no_null_history(row.loe_desc);
              html += td_no_null_history(row.history_desc);
              html += td_no_null_history(row.field_modified);
              html += td_no_null_history(row.field_old_value);
              html += td_no_null_history(row.field_new_value);
              html += '</tr>';
            });
            html += '</tbody>';
            //endregion
            $('#LoeHistoryTable').prepend(html);
            $('#modal_loe_history').modal("show");
          }

        }
      });
      
    });

    $(document).on('click', '#loe_history_excel', function () {
      project_name = $('#project_name').val();
      d = new Date();
      date = d.toISOString();
      filename = 'LoE_History_'+project_name+'_'+date;
      $('#LoeHistoryTable').tableExport({
        fileName: filename, 
        type:'excel',
        exportHiddenCells: false,
        htmlContent: false,
        mso: {
            fileFormat:'xlsx'
        }
      });
    });
    //endregion

    //region Export table to excel
    $(document).on('click', '.loe_table_to_excel', function () {
      project_name = $('#project_name').val();
      d = new Date();
      date = d.toISOString();
      filename = 'LoE_'+project_name+'_'+date;

      $('.table_recurrent').empty();
      $('.table_recurrent').html('yes');

      if (loe_data.col.site.length>0) {
        $('.sites_header').empty();
        $('td.formula_cell').each(function () {
          formula_text = $(this).find('.formula_text').html();
          $(this).empty();
          $(this).append(formula_text);
        });
      }
      
      if (loe_data.col.cons.length>0) {
        $('.consultants_header').empty();
        $('.consultants_main_header').each(function () {
          value = $(this).html().split('<div');
          const search = '<br>';
          const replaceWith = '-';
          const html = value[0].split(search).join(replaceWith);
          $(this).empty();
          $(this).append(html);
        });
      }
      
      $('#LoeTable').tableExport({
        fileName: filename, 
        type:'excel',
        exportHiddenCells: false,
        htmlContent: false,
        mso: {
            fileFormat:'xlsx'
        }
      });

      getLoeList(project_id);

    });
    //endregion

    //region Mass signoff
    // MASS SIGNOFF
    $(document).on('click', '.loe_mass_signoff', function () {
      //console.log(loe_data.col.domains);
      var hidden = '';
      hidden += '<input class="form-control" id="modal_loe_signoff_form_project_id" type="hidden" value="'+{{ $project->id }}+'">';
      $('#modal_loe_signoff_form_hidden').append(hidden);

      var html = '';
      html += '<option value="All" >All</option>';
      
      loe_data.col.domains.forEach(fill_signoff_domains);
      function fill_signoff_domains (domain){
        html += '<option value="'+domain+'" >'+domain+'</option>';
      }

      $('#modal_loe_signoff_form_domain').empty();
      $('#modal_loe_signoff_form_domain').append(html);

      // Init select2 boxes in the modal
      $("#modal_loe_signoff_form_domain").select2({
          allowClear: false
      });

      $('#modal_loe_signoff').modal("show");
    });

    $(document).on('click', '#modal_loe_signoff_create_update_button', function () {
      var modal_loe_signoff_form_project_id = $('input#modal_loe_signoff_form_project_id').val();
      var modal_loe_signoff_form_domain = $('select#modal_loe_signoff_form_domain').children("option:selected").val();
      var data = {'domain':modal_loe_signoff_form_domain};

      $.ajax({
            type: 'get',
            url: "{!! route('loeMassSignoff','') !!}/"+modal_loe_signoff_form_project_id,
            data:data,
            dataType: 'json',
            success: function(data) {
              //console.log(data);
              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
              } else {
                  box_type = 'danger';
                  message_type = 'error';
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(2000).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
              $('#modal_loe_signoff').modal('hide');
              getLoeList(project_id);
            }
      });
    });
    //endregion

    //region Loe Sites
    // SITE DELETE
    $(document).on('click', '.site_delete', function () {
      var data = {'name':$(this).data('name')};
      bootbox.confirm("Are you sure want to delete this calculation?", function(result) {
        if (result){
          //console.log($(this).data('name'));
          $.ajax({
            type: 'get',
            url: "{!! route('loeSiteDelete','') !!}/"+{{ $project->id }},
            data: data,
            dataType: 'json',
            success: function(data) {
              //console.log(data);

              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  delay = 2000;
                  getLoeList(project_id);
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  delay = 10000;
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(delay).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
              console.log('Error: ' + errorMessage);
            }
          });
        }
      });
      
    });

    // SITE CREATE EDIT
    function modal_loe_site_form_clean(title) {
      $('#modal_loe_site_title').text(title+' Calculation');
      $('#modal_loe_site_create_update_button').text(title);
      $('#modal_loe_site_form_hidden').empty();

      // Clean all input
      $("form#modal_loe_site_form input").each(function(){ 
        $(this).val('');
      });
      // Clean all textarea
      $("form#modal_loe_site_form textarea").each(function(){
        $(this).val('');
      });
      // Clean all select
      $("form#modal_loe_site_form select").each(function(){
        $(this).val('');
        $(this).select2().trigger('change');
      });

      modal_loe_site_form_error_clean();
    }

    function modal_loe_site_form_error_clean() {
      // Clean all error class
      $("form#modal_loe_site_form  div.form-group").each(function(){
        $(this).removeClass('has-error');
      });
      // Clean all error message
      $("form#modal_loe_site_form span.help-block").each(function(){
        $(this).empty();
      });
    }

    $(document).on('click', '.site_edit', function () {
      //console.log($(this).data('name'));
      modal_loe_site_form_clean('Update');

      var hidden = '';
      hidden += '<input class="form-control" id="modal_loe_site_form_project_id" type="hidden" value="'+{{ $project->id }}+'">';
      hidden += '<input class="form-control" id="modal_loe_site_form_old_name" type="hidden" value="'+$(this).data('name')+'">';
      hidden += '<input class="form-control" id="modal_loe_site_form_action" type="hidden" value="update">';
      $('#modal_loe_site_form_hidden').append(hidden);

      // Init fields
      
      $('input#modal_loe_site_form_name').val($(this).data('name'));

      $('#modal_loe_site').modal("show");
    });

    $(document).on('click', '.site_create', function () {
      //console.log($(this).data('name'));
      modal_loe_site_form_clean('Create');

      var hidden = '';
      hidden += '<input class="form-control" id="modal_loe_site_form_project_id" type="hidden" value="'+{{ $project->id }}+'">';
      hidden += '<input class="form-control" id="modal_loe_site_form_action" type="hidden" value="create">';
      $('#modal_loe_site_form_hidden').append(hidden);

      // Init fields

      $('#modal_loe_site').modal("show");
    });

    $(document).on('click', '#modal_loe_site_create_update_button', function () {
      // hidden input
      var modal_loe_site_form_project_id = $('input#modal_loe_site_form_project_id').val();
      var modal_loe_site_form_old_name = $('input#modal_loe_site_form_old_name').val();
      var modal_loe_site_form_action = $('input#modal_loe_site_form_action').val();

      var modal_loe_site_form_name = $('input#modal_loe_site_form_name').val();


      switch (modal_loe_site_form_action) {
        case 'create':
          var data = {'name':modal_loe_site_form_name
          };
          // Route info
          var loe_site_create_update_route = "{!! route('loeSiteCreate','') !!}/"+modal_loe_site_form_project_id;
          var type = 'post';
          break;

        case 'update':
          var data = {'name':modal_loe_site_form_name,'old_name':modal_loe_site_form_old_name
          };
          // Route info
          var loe_site_create_update_route = "{!! route('loeSiteEdit','') !!}/"+modal_loe_site_form_project_id;
          var type = 'patch';
          break;
      }

      $.ajax({
            type: type,
            url: loe_site_create_update_route,
            data:data,
            dataType: 'json',
            success: function(data) {
              modal_close = false;
              //console.log(data);
              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  modal_close = true;
              } else if (data.result == 'validation_errors'){
                modal_loe_site_form_error_clean();
                //console.log(data.errors);
                $.each(data.errors, function (key, value) {
                  //console.log(value);
                  $('#modal_loe_site_formgroup_'+value.field).addClass('has-error');
                  $('#modal_loe_site_form_'+value.field+'_error').text(value.msg);
                });
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  modal_close = true;
              }

              if (modal_close) {
                $('#flash-message').empty();
                var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
                $('#flash-message').append(box);
                $('#delete-message').delay(2000).queue(function () {
                    $(this).addClass('animated flipOutX')
                });
                $('#modal_loe_site').modal('hide');
                getLoeList(project_id);
              }
              
            }
      });

    });
    //endregion

    //region Loe Consulting
    // CONS DELETE
    $(document).on('click', '.cons_delete', function () {
      //console.log($(this).data('name'));
      var data = {'name':$(this).data('name')};
      bootbox.confirm("Are you sure want to delete this consulting type?", function(result) {
        if (result){
          //console.log($(this).data('name'));
          $.ajax({
            type: 'get',
            url: "{!! route('loeConsDelete','') !!}/"+{{ $project->id }},
            data: data,
            dataType: 'json',
            success: function(data) {
              console.log(data);

              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  delay = 2000;
                  getLoeList(project_id);
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  delay = 10000;
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(delay).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
              console.log('Error: ' + errorMessage);
            }
          });
        }
      });
    });

    // CONS CREATE EDIT
    function modal_loe_cons_form_clean(title) {
      $('#modal_loe_cons_title').text(title+' Consulting Type');
      $('#modal_loe_cons_create_update_button').text(title);
      $('#modal_loe_cons_form_hidden').empty();

      // Clean all input
      $("form#modal_loe_cons_form input").each(function(){ 
        $(this).val('');
      });
      // Clean all textarea
      $("form#modal_loe_cons_form textarea").each(function(){
        $(this).val('');
      });
      // Clean all select
      $("form#modal_loe_cons_form select").each(function(){
        $(this).val('');
        $(this).select2().trigger('change');
      });

      modal_loe_cons_form_error_clean();
    }

    function modal_loe_cons_form_error_clean() {
      // Clean all error class
      $("form#modal_loe_cons_form  div.form-group").each(function(){
        $(this).removeClass('has-error');
      });
      // Clean all error message
      $("form#modal_loe_cons_form span.help-block").each(function(){
        $(this).empty();
      });
    }

    $(document).on('click', '#modal_loe_cons_clear_country_button', function () {
      $('select#modal_loe_cons_form_country').val('');
      $('select#modal_loe_cons_form_country').select2().trigger('change');
    });

    $(document).on('click', '#modal_loe_cons_clear_seniority_button', function () {
      $('select#modal_loe_cons_form_seniority').val('');
      $('select#modal_loe_cons_form_seniority').select2().trigger('change');
    });

    $(document).on('click', '.cons_create', function () {
      
      modal_loe_cons_form_clean('Create');

      var hidden = '';
      hidden += '<input class="form-control" id="modal_loe_cons_form_project_id" type="hidden" value="'+{{ $project->id }}+'">';
      hidden += '<input class="form-control" id="modal_loe_cons_form_action" type="hidden" value="create">';
      $('#modal_loe_cons_form_hidden').append(hidden);

      // Init fields

      $('#modal_loe_cons').modal("show");
    });

    
    $(document).on('click', '.cons_edit', function () {
      //console.log($(this).data('name'));
      //console.log($(this).data('seniority'));
      //console.log($(this).data('location'));
      modal_loe_cons_form_clean('Update');

      var hidden = '';
      hidden += '<input class="form-control" id="modal_loe_cons_form_project_id" type="hidden" value="'+{{ $project->id }}+'">';
      hidden += '<input class="form-control" id="modal_loe_cons_form_old_name" type="hidden" value="'+$(this).data('name')+'">';
      hidden += '<input class="form-control" id="modal_loe_cons_form_action" type="hidden" value="update">';
      $('#modal_loe_cons_form_hidden').append(hidden);

      // Init fields
      
      $('input#modal_loe_cons_form_name').val($(this).data('name'));

      $('select#modal_loe_cons_form_country').val($(this).data('location'));
      $('select#modal_loe_cons_form_country').select2().trigger('change');

      $('select#modal_loe_cons_form_seniority').val($(this).data('seniority'));
      $('select#modal_loe_cons_form_seniority').select2().trigger('change');

      $('#modal_loe_cons').modal("show");
    });

    $(document).on('click', '#modal_loe_cons_create_update_button', function () {
      // hidden input
      var modal_loe_cons_form_project_id = $('input#modal_loe_cons_form_project_id').val();
      var modal_loe_cons_form_action = $('input#modal_loe_cons_form_action').val();

      var modal_loe_cons_form_name = $('input#modal_loe_cons_form_name').val();
      var modal_loe_cons_form_country = $('select#modal_loe_cons_form_country').children("option:selected").val();
      var modal_loe_cons_form_seniority = $('select#modal_loe_cons_form_seniority').children("option:selected").val();

      
      
      switch (modal_loe_cons_form_action) {
        case 'create':
          var data = {'name':modal_loe_cons_form_name,'location':modal_loe_cons_form_country,'seniority':modal_loe_cons_form_seniority
          };
          // Route info
          var loe_cons_create_update_route = "{!! route('loeConsCreate','') !!}/"+modal_loe_cons_form_project_id;
          var type = 'post';
          break;

        case 'update':
          var modal_loe_cons_form_old_name = $('input#modal_loe_cons_form_old_name').val();
          var data = {'name':modal_loe_cons_form_name,'old_name':modal_loe_cons_form_old_name,'location':modal_loe_cons_form_country,'seniority':modal_loe_cons_form_seniority
          };
          // Route info
          var loe_cons_create_update_route = "{!! route('loeConsEdit','') !!}/"+modal_loe_cons_form_project_id;
          var type = 'patch';
          break;
      }

      $.ajax({
            type: type,
            url: loe_cons_create_update_route,
            data:data,
            dataType: 'json',
            success: function(data) {
              modal_close = false;
              //console.log(data);
              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  modal_close = true;
              } else if (data.result == 'validation_errors'){
                modal_loe_cons_form_error_clean();
                //console.log(data.errors);
                $.each(data.errors, function (key, value) {
                  //console.log(value);
                  $('#modal_loe_cons_formgroup_'+value.field).addClass('has-error');
                  $('#modal_loe_cons_form_'+value.field+'_error').text(value.msg);
                });
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  modal_close = true;
              }

              if (modal_close) {
                $('#flash-message').empty();
                var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
                $('#flash-message').append(box);
                $('#delete-message').delay(2000).queue(function () {
                    $(this).addClass('animated flipOutX')
                });
                $('#modal_loe_cons').modal('hide');
                getLoeList(project_id);
              }
              
            }
      });

    });
    //endregion

    //region Row actions
    //region DELETE
    $(document).on('click', '.buttonLoeDelete', function () {
      //console.log($(this).data('id'));
      var id = $(this).data('id');
      var first_line = $(this).data('first_line');
      bootbox.confirm("Are you sure want to delete this line?", function(result) {
        if (result){
          //console.log($(this).data('name'));
          $.ajax({
            type: 'get',
            url: "{!! route('loeDelete','') !!}/"+id,
            dataType: 'json',
            success: function(data) {
              console.log(data);

              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  delay = 2000;
                  getLoeList(project_id);
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  delay = 10000;
              }

              if (first_line == 1) {
                window.location.href = "{!! route('toolsActivities') !!}/";
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(delay).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
              console.log('Error: ' + errorMessage);
            }
          });
        }
      });
    });
    //endregion

    //region DUPLICATE
    $(document).on('click', '.buttonLoeDuplicate', function () {
      //console.log($(this).data('id'));
      var id = $(this).data('id');
      $.ajax({
            type: 'post',
            url: "{!! route('loeDuplicate','') !!}/"+id,
            dataType: 'json',
            success: function(data) {
              console.log(data);

              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  delay = 2000;
                  getLoeList(project_id);
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  delay = 10000;
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(delay).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
              console.log('Error: ' + errorMessage);
            }
          });
    });
    //endregion
    
    //region CREATE
    $(document).on('click', '.buttonLoeCreate', function () {
      //console.log($(this).data('id'));
      var id = $(this).data('id');
      $.ajax({
            type: 'get',
            url: "{!! route('loeCreate','') !!}/"+id,
            dataType: 'json',
            success: function(data) {
              console.log(data);

              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  delay = 2000;
                  getLoeList(project_id);
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  delay = 10000;
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(delay).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
              console.log('Error: ' + errorMessage);
            }
          });
    });
    //endregion

    //region EDIT
    // This is to select the text when you click inside a td that is editable
    $(document).on('focus', 'td.editable', function() {
        var range = document.createRange();
        range.selectNodeContents(this);  
        var sel = window.getSelection(); 
        sel.removeAllRanges(); 
        sel.addRange(range);
        editable_old_value = $(this).html();
    });

    //Now this is the part when we edit a cell
    $(document).on('blur', '.editable', function(e){
      var td = $(this);
      var tr = td.closest('tr');
      var loe_id = tr.data('id');
      var colname = td.data('colname');
      var value = td.html();
      var old_value = editable_old_value;

      if (value != editable_old_value) {
        switch (colname) {
          //region Edit GENERAL
          case 'main_phase':
          case 'secondary_phase':
          case 'domain':
          case 'description':
          case 'option':
          case 'assumption':
          case 'start_date':
          case 'end_date':
          case 'quantity':
          case 'loe_per_unit':
            var request = {'id':loe_id,'colname':colname,'value':value};
            $.ajax({
              type: 'post',
              url: "{!! route('loeEditGeneral') !!}",
              data:request,
              dataType: 'json',
              beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
               td.attr('contenteditable', false);
              },
              success: function(data) {
                if (data.result == 'success'){
                  if (colname == 'quantity' || colname == 'loe_per_unit') {
                    fill_total();
                  }
                  //SUCCESS
                  td.addClass('update_success');
                  setTimeout(function () {
                    td.removeClass('update_success');
                  }, 1000);
                } else {
                  // ERROR
                  td.html(old_value);
                  td.addClass('update_error');
                  setTimeout(function () {
                    td.removeClass('update_error');
                  }, 2000);

                  box_type = 'danger';
                  message_type = 'error';

                  $('#flash-message').empty();
                  var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
                  $('#flash-message').append(box);
                  $('#delete-message').delay(2000).queue(function () {
                      $(this).addClass('animated flipOutX')
                  });
                }
              },
              complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                td.attr('contenteditable', true);
              }
            });
            break;
          //endregion
            break;
          default:
            break;
        }
      }
    });

    //endregion

    //region FORMULA
    function creat_tooltip_if_formula() {
      if ($('textarea#loe_formula').val()) {
        $("input#loe_loe_per_u").prop("disabled", true);
        $('div#loe_loe_per_u_tooltip').tooltip({'placement': 'bottom' , 'title' : 'If formula is used, this field will be calculated!'});
      } else {
        $("input#loe_loe_per_u").prop("disabled", false);
        $('div#loe_loe_per_u_tooltip').tooltip("destroy");
      }
    }

    //Now we need to remove disable for the loe per unit in case formula is empty or not
    $(document).on('keyup', 'textarea#loe_formula', function () {
      creat_tooltip_if_formula();
    });
    //endregion

    //region SIGNOFF
    $(document).on('click', '.buttonLoeSignoff', function () {
      //console.log($(this).data('id'));
      var id = $(this).data('id');
          //console.log($(this).data('name'));
          $.ajax({
            type: 'get',
            url: "{!! route('loeSignoff','') !!}/"+id,
            dataType: 'json',
            success: function(data) {
              //console.log(data);

              if (data.result == 'success'){
                  box_type = 'success';
                  message_type = 'success';
                  delay = 2000;
                  getLoeList(project_id);
              }
              else {
                  box_type = 'danger';
                  message_type = 'error';
                  delay = 2000;
              }

              $('#flash-message').empty();
              var box = $('<div id="delete-message" class="alert alert-'+box_type+' alert-dismissible flash-'+message_type+'" role="alert"><button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>'+data.msg+'</div>');
              $('#flash-message').append(box);
              $('#delete-message').delay(delay).queue(function () {
                  $(this).addClass('animated flipOutX')
              });
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
              console.log('Error: ' + errorMessage);
            }
          });
    });
    //endregion
    
    //endregion

  //endregion

});
</script>
@stop