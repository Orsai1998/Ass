      <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Department name</th>
                                                <th>Birth date</th>
                                                <th>Gender</th>
                                                <th>Hire date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($info as $key)
                                            <tr>
                                                <td><a href="personalInf/{{$key->emp_no}}">{{$key->emp_no}}</a></td>
                                                <td>{{$key->first_name}}</td>
                                                <td>{{$key->last_name}}</td>
                                                <td>{{$key->dept_name}}</td>
                                                <td>{{$key->birth_date}}</td>
                                                <td>{{$key->gender}}</td>
                                                <td>{{$key->hire_date}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$info->links()}}