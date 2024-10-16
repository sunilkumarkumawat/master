@if(!empty($data))
                @if($data->count() > 0)
                        @php
                           $i=1;
                        @endphp
                        @foreach ($data  as $item)
                        <tr>
                                <input type="hidden" id="class_type_id" name="class_type_id[]" value="{{ $item['class_type_id'] ?? '' }}">
                                <input type="hidden" id="admission_id" name="admission_id[]" value="{{ $item['id'] ?? '' }}">
                                <input type="hidden" id="name" name="name[]" value="{{ $item['name'] ?? '' }}">
                                <input type="hidden" id="email" name="email[]" value="{{ $item['email'] ?? '' }}">
                                <input type="hidden" id="name" name="name[]" value="{{ $item['name'] ?? '' }}">
                                <input type="hidden" id="mobile" name="mobile[]" value="{{ $item['mobile'] ?? '' }}">
                            <td> {{ $i++ }} &nbsp; <input type="checkbox" id="admission_ids" name="admission_ids[]" value="{{ $item['id'] ?? '' }}" checked>
                            
                            </td>
                            <td>{{ $item['admissionNo'] ?? '' }}</td>
                            <td>{{ $item['first_name'] ?? '' }} {{ $item['last_name'] ?? '' }}</td>
                            <td>{{ $item['ClassTypes']['name'] ?? '' }}</td>
                            
                            <td>
                    			<select class="form-control" id="session_id" name="session_id[]" >
                                  @if(!empty($session)) 
                                      @foreach($session as $item)
                                         <option value="{{ $item->id ?? ''  }}" 
                                         @if(Session::get('session_id')+1 > $item->id)
                                       {{"disabled"}}
                                        
                                         @endif
                                         >{{ $item->from_year ?? ''  }}{{"-"}}{{ $item->to_year ?? ''  }}</option>
                                      @endforeach
                                  @endif  
                                </select>                                    
                            </td>                            
                        </tr>
                   @endforeach
                @else
                                <tr>
                                    <td colspan="12" class="text-center">No Students Found !</td>
                                </tr>
                @endif
                  
              @endif    
                 