@extends('layout.app') 
@section('content')
@php
$attendanceType = Helper::attendanceType();
  $classType = Helper::classType();
  $getPermission = Helper::getPermission();

@endphp
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


 <div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-calendar-minus-o"></i> &nbsp;{{ __('student.View Students Attendance') }}</h3>
                    <div class="card-tools">
                        @if(Session::get('role_id') !== 3)
                    <a href="{{url('studentsAttendanceAdd')}}" class="btn btn-primary {{($getPermission->add == 1) ? '' : 'd-none'}} btn-sm" ><i class="fa fa-plus"></i>{{ __('common.Add') }}  </a>
                 
                   <a href="{{url('studentsDashboard')}}" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i>{{ __('common.Back') }}  </a>
                      @endif
                    </div>
                    
                    </div>      
                    
                    @if(count($classType) > 0)
                <form id="quickForm" action="{{ url('studentsAttendanceView2') }}"  method="post">
                        @csrf 
                    <div class="row m-2">
                    @if(Session::get('role_id') == 1)
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="State" class="required">{{ __('student.Admission No.') }}</label>
                             <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="{{ __('student.Admission No.') }}" value="{{ $search['admissionNo'] ?? '' }}">
                          </div>
                        </div>
                    @endif
                        <div class="col-md-2">
            			<div class="form-group">
            				<label>{{ __('common.Month') }} </label>
            				<select class="form-control select2" id='date__' name="date">
                                <option value=''>--{{ __('student.Select Month') }}--</option>
                                <option {{$search['date'] == 1 ? "selected" : "" }} value='01'>Janaury</option>
                                <option {{$search['date'] == 2 ? "selected" : "" }} value='02'>February</option>
                                <option {{$search['date'] == 3 ? "selected" : "" }} value='03'>March</option>
                                <option {{$search['date'] == 4 ? "selected" : "" }} value='04'>April</option>
                                <option {{$search['date'] == 5 ? "selected" : "" }} value='05'>May</option>
                                <option {{$search['date'] == 6 ? "selected" : "" }} value='06'>June</option>
                                <option {{$search['date'] == 7 ? "selected" : "" }} value='07'>July</option>
                                <option {{$search['date'] == 8 ? "selected" : "" }} value='08'>August</option>
                                <option {{$search['date'] == 9 ? "selected" : "" }} value='09'>September</option>
                                <option {{$search['date'] == 10 ? "selected" : "" }} value='10'>October</option>
                                <option {{$search['date'] == 11 ? "selected" : "" }} value='11'>November</option>
                                <option {{$search['date'] == 12 ? "selected" : "" }} value='12'>December</option>
                                </select> 
            		    </div>
            		</div>       
            		@if(Session::get('role_id') == 1 || Session::get('role_id') == 2)
                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label>{{ __('common.Class') }}</label>
                    			<select class="form-control select2" id="class_type_id" name="class_type_id" >
                    			    @if(Session::get('role_id') != 2)
                    			    
                    			<option value="">{{ __('common.Select') }}</option>
                                 @endif
                                 @if(!empty($classType)) 
                                      @foreach($classType as $type)
                                         <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['class_type_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                      @endforeach
                                  @endif
                                </select>
                    	    </div>
                    	</div>
                    @endif
                @if(Session::get('role_id') == 1)
                    <div class="col-md-4">
            			<div class="form-group">
            				<label>{{ __('common.Search By Keywords') }}</label>
            				<input type="text" class="form-control" id="name" name="name"  value="{{ $search['name'] ?? '' }}" placeholder="{{ __('common.Ex. Name, Mobile, Email, Aadhaar etc.') }}">
            		    </div>
            		</div> 
            	@endif	
                        <div class="col-md-1 ">
                    	    <button type="submit" class="btn btn-primary mt-4">{{ __('common.Search') }}</button>
                    	</div>
	
                    </div>
                </form>
                @else
                <p class="text-center text-danger mt-2">You are not yet authorized for viewing attendance .... please contact your administrator</p>
                  @endif
 

                  <table id="table" class="table table-bordered table-striped border table-responsive dataTable paddingTable">
                  <thead class="bg-primary">
                    <tr id='days'role="row">
                    </tr>
                  </thead>
                <tbody id='student_list'>
                    
                                                                         
                       
                         <tr>
                        
                                                
                       
              </tr>
                                              
                       
                  
                                           
                      
                      </tbody>
                      
                  </table>
  
               <div class="col-md-10">
                    <button class="btn btn-primary" onclick="downloadCSV()">Download CSV</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-xs btn-success">&nbsp;P&nbsp;</span> Present &nbsp; <span class="btn btn-xs btn-danger">&nbsp;A&nbsp;</span> Absent &nbsp; <span class="btn btn-xs btn-warning">Hf</span> Half-day &nbsp; <span class="btn btn-xs btn-primary">&nbsp;H&nbsp;</span> Holiday  &nbsp; <span class="btn btn-xs btn-info">&nbsp;W&nbsp;</span> Work From Home &nbsp; <span class="btn btn-xs btn-secondary">&nbsp;DS&nbsp;</span>Double Shift 
                </div>                 
    

                  </div>
                    
              </div>
            </div>
        </div>
      </div>
    </section>
</div>

<script>
     $('#quickForm').submit(function(event) {
        var date_array =[];
        var allStudents = @json($allStudents);

       
        $('#student_list').html('');
        event.preventDefault();
         $('#loadingModal').modal('show');
        var name = $('#name').val();
        var class_type_id = $('#class_type_id').val();
        var date = parseInt($('#date__').val());
      
        var admissionNo = $('#admissionNo').val();
        var URL = "{{ url('/') }}";
        var year = 2024; // Example year
        var month = parseInt($('#date__').val())-1;
        // Example month (0-indexed, so 3 represents April)
        var daysInMonth = new Date(year, date, 0).getDate();
        var days = $('#days');
        days.html('');
        days.append('<th>Admission No</th>');
        days.append('<th >Name</th>');
        row_days = '';
        for(var i= 1; i<=daysInMonth; i++)
        {
            var date = new Date(year, month, i);
             var dayOfWeek = date.toLocaleString('en', { weekday: 'short' }); 
             row_days += '<th class="days_">' +i+ ' ' + dayOfWeek+ '</th>';
        }
         row_days += '<th class="days_">Present</th>';
         row_days += '<th class="days_">Absent</th>';
         row_days += '<th class="days_">Holiday</th>';
         row_days += '<th class="days_">Leave</th>';
         row_days += '<th class="days_">Event</th>';
        days.append(row_days);
        var container = $('#student_list');
        var count =0;    
        allStudents.forEach(function(item,index) {

                if(parseInt(item.class_type_id) == parseInt(class_type_id))
                {


                    var row ='<tr id='+item.id+'><td>' +item.id + '</td><td>'+item.first_name + (item.last_name ?? '')+ '</td>';

                    var row2='';
                    var row3='';

                    var array_d = [];
                    for(var i= 1; i<=daysInMonth; i++)
        {
          var newclass =  year+'-'+$('#date__').val()+'-'+(i<10 ? '0'+i : i);
            array_d.push(newclass) ;
          
             row2 += '<td class='+newclass+'_'+item.id+'></td>';
        }                           
     row3 += '<td class="persent_' + item.id + '"></td>';
row3 += '<td class="absent_' + item.id + '"></td>';
row3 += '<td class="holiday_' + item.id + '"></td>';
row3 += '<td class="leave_' + item.id + '"></td>';
row3 += '<td class="event_' + item.id + '"></td>';
         
        
                container.append(row +row2+row3+'</tr>');
                date_array[count]  ={'id':item.id , 'date':array_d}
                count++;
                }
              
            });


          

            var result = [];
            function divideIntoSlots(number) {
   
    var slots = Math.ceil(number / 15);
    var start =0;
    var end =0;

  
    for (var i = 0; i < slots; i++) {
        var slotValue = Math.min(15, number); 
        var end = start + slotValue - 1; // Subtract 1 to ensure end is inclusive
        result.push({ 'from': start, 'to': end });
        start = end + 1;
        number -= slotValue;
    }
    
   
    
    return result;
}



var slots = divideIntoSlots(date_array.length);


var loop =0;

fetchData();
            function fetchData() {

            //  console.log(date_array)
                if(loop < result.length)
                {
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: URL+'/studentsAttendanceViewTable',
            data: {data:JSON.stringify(date_array),loop:result[loop]},
            success: function (response) {
                $.each(response.data, function(index, item) {

              
                    $.each(item, function(index2, item2) {

                  var span_row = '';
                  var time24h = item2.time+'';
        var time12h = convertTo12HrFormat(time24h);
                          if(item2.attendance_status_id == 1)
                          {
                            span_row = `<span class="p-1 bg-success">P [In:${item2.time} ,Out:${item2.out_time}]</span>`
                          }
                          
                          else if(item2.attendance_status_id == 3)
                          {
                            span_row = '<span class="p-1 bg-danger">A</span>'
                          }
                          
                          else if(item2.attendance_status_id == 5)
                          {
                            span_row = '<span class="p-1 bg-primary">H</span>'
                          }
                          
                          else if(item2.attendance_status_id == 9)
                          {
                            span_row = '<span class="p-1 bg-warning">L</span>'
                          }
                          
                          else if(item2.attendance_status_id == 10)
                          {
                            span_row = '<span class="p-1 bg-secondary">E</span>'
                          }
                          
                         
                    
                $('.'+item2.date+'_'+item2.admission_id).append(span_row);
           
               
            });
            });

            loop++;
            fetchData();
            countStatuses();
            }
          });
        }

        }
        });

 function countStatuses() {
    const table = document.getElementById('table');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    for (let row of rows) {
        
        let present = 0, absent = 0, holiday = 0, event = 0, leave = 0;
        const rowId = row.id; // Assuming each row has a unique ID like `row_51`

        for (let i = 2; i < row.cells.length; i++) {
            const cell = row.cells[i];
            if (cell.querySelector('span')) {
                const status = cell.querySelector('span').innerText;
                switch (status) {
                    case 'P':
                        present++;
                        break;
                    case 'A':
                        absent++;
                        break;
                    case 'H':
                        holiday++;
                        break;
                    case 'E':
                        event++;
                        break;
                    case 'L':
                        leave++;
                        break;
                }
            }
        }

        // Update counts in the appropriate <td> elements by class name
        const presentCell = document.querySelector(`.persent_${rowId}`);
        const absentCell = document.querySelector(`.absent_${rowId}`);
        const holidayCell = document.querySelector(`.holiday_${rowId}`);
        const eventCell = document.querySelector(`.event_${rowId}`);
        const leaveCell = document.querySelector(`.leave_${rowId}`);

        if (presentCell) presentCell.innerText = present;
        if (absentCell) absentCell.innerText = absent;
        if (holidayCell) holidayCell.innerText = holiday;
        if (eventCell) eventCell.innerText = event;
        if (leaveCell) leaveCell.innerText = leave;
    }
}
        function convertTo12HrFormat(time24h) {
        var timeArray = time24h.split(':');
        var hours = parseInt(timeArray[0]);
        var minutes = parseInt(timeArray[1]);
        var period = hours < 12 ? 'AM' : 'PM';

        if (hours === 0) {
            hours = 12;
        } else if (hours > 12) {
            hours = hours - 12;
        }

        return hours + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + period;
    }

</script>

<script>



  
function downloadCSV() {
    var month = $('#date__ option:selected').text();
    var classtype = $('#class_type_id option:selected').text();
    let csv = [];
     var pageTitle = document.title;
    // Add month and class type to the first row
    csv.push(pageTitle);
    csv.push(`Month: ${month}, Class: ${classtype}`);

    const rows = document.querySelectorAll("table tr");

    for (const row of rows.values()) {
        const cells = row.querySelectorAll("td, th");
        const rowText = Array.from(cells).map((cell) => cell.innerText);
        csv.push(rowText.join(","));
    }
    
    const csvFile = new Blob([csv.join("\n")], {
        type: "text/csv;charset=utf-8;"
    });

    saveAs(csvFile, "Attendance_" + month + "_" + classtype + ".csv");
}

</script>        
<style>
    .view {
  margin: auto;
  width: 100%;
}

.wrapper {
  position: relative;
  overflow: auto;
  border: 1px solid black;
  white-space: nowrap;
}

.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;
}

.first-col {
  width: 100px;
  min-width: 100px;
  max-width: 100px;
  left: 0px;
}

.second-col {
  width: 150px;
  min-width: 150px;
  max-width: 150px;
  left: 100px;
}

.paddingTable{
    padding-bottom:20px;    
}
.paddingTable th,td{
    padding:10px;
}

.downloadCSV{
    width:150px;
    background:#002c54;
    color:white;
    border-radius: 8px;
}
</style>
@endsection 