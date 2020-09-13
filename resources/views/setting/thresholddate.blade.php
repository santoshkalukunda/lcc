@extends('dashboard')
@include('sidemenu')
@section('title')
Set Fiscal Current Year
@endsection
@section('content')


    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Set Fiscal Current Year</div>
            <div class="card-body">

                <form action="{{ route('setdate.store') }}" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            Fiscal Year
                        </div>
                        <div class="col-md-2">
                            <select name="fiscal" id="fiscal" id="" class="form-control" required>
                                <option value="">Select Fiscal</option>
                                <option value="2099/100">2099/100</option>
                                <option value="2098/099">2098/099</option>
                                <option value="2097/098">2097/098</option>
                                <option value="2096/097">2096/097</option>
                                <option value="2095/096">2095/096</option>
                                <option value="2094/095">2094/095</option>
                                <option value="2093/094">2093/094</option>
                                <option value="2092/093">2092/093</option>
                                <option value="2091/092">2091/092</option>
                                <option value="2090/091">2090/091</option>
                                <option value="2089/090">2089/090</option>
                                <option value="2089/090">2089/090</option>
                                <option value="2088/089">2088/089</option>
                                <option value="2087/088">2087/088</option>
                                <option value="2086/087">2086/087</option>
                                <option value="2085/086">2085/086</option>
                                <option value="2084/085">2084/085</option>
                                <option value="2083/084">2083/084</option>
                                <option value="2082/083">2082/083</option>
                                <option value="2081/082">2081/082</option>
                                <option value="2080/081">2080/081</option>
                                <option value="2079/080">2079/080</option>
                                <option value="2078/079">2078/079</option>
                                <option value="2077/078">2077/078</option>
                                <option value="2076/077">2076/077</option>
                                <option value="2075/076">2075/076</option>
                                <option value="2074/075">2074/075</option>
                                <option value="2073/074">2073/074</option>
                                <option value="2072/073">2072/073</option>
                                <option value="2071/072">2071/072</option>
                                <option value="2070/071">2070/071</option>
                                <option value="2069/070">2069/070</option>
                                <option value="2068/069">2068/069</option>
                                <option value="2067/068">2067/068</option>
                                <option value="2066/067">2066/067</option>
                                <option value="2065/066">2065/066</option>
                                <option value="2064/065">2064/065</option>
                                <option value="2063/064">2063/064</option>
                                <option value="2062/063">2062/063</option>
                                <option value="2061/062">2061/062</option>
                                <option value="2060/061">2060/061</option>
                                <option value="2059/060">2059/060</option>
                                <option value="2058/059">2058/059</option>
                                <option value="2057/058">2057/058</option>
                                <option value="2056/057">2056/057</option>
                                <option value="2055/056">2055/056</option>
                                <option value="2054/055">2054/055</option>
                                <option value="2053/054">2053/054</option>
                                <option value="2052/053">2052/053</option>
                                <option value="2051/052">2051/052</option>
                                <option value="2050/051">2050/051</option>
                                <option value="2049/050">2049/050</option>
                                <option value="2048/049">2048/049</option>
                                <option value="2047/048">2047/048</option>
                                <option value="2046/047">2046/047</option>
                                <option value="2045/046">2045/046</option>
                                <option value="2044/045">2044/045</option>
                                <option value="2043/044">2043/044</option>
                                <option value="2042/043">2042/043</option>
                                <option value="2041/042">2041/042</option>
                                <option value="2040/041">2040/041</option>
                                <option value="2039/040">2039/040</option>
                                <option value="2038/039">2038/039</option>
                                <option value="2037/038">2037/038</option>
                                <option value="2036/037">2036/037</option>
                                <option value="2035/036">2035/036</option>
                                <option value="2034/035">2034/035</option>
                                <option value="2033/034">2033/034</option>
                                <option value="2032/033">2032/033</option>
                                <option value="2030/031">2030/031</option>
                                <option value="2029/030">2029/030</option>
                                <option value="2028/029">2028/029</option>
                                <option value="2027/028">2027/028</option>
                                <option value="2026/027">2026/027</option>
                                <option value="2025/026">2025/026</option>
                                <option value="2024/025">2024/025</option>
                                <option value="2023/024">2023/024</option>
                                <option value="2022/023">2022/023</option>
                                <option value="2021/022">2021/022</option>
                                <option value="2020/021">2020/021</option>
                                <option value="2019/020">2019/020</option>
                                <option value="2018/019">2018/019</option>
                                <option value="2017/018">2017/018</option>
                                <option value="2016/017">2016/017</option>
                                <option value="2015/016">2015/016</option>
                                <option value="2014/015">2014/015</option>
                                <option value="2013/014">2013/014</option>
                                <option value="2012/013">2012/013</option>
                                <option value="2011/012">2011/012</option>
                                <option value="2010/011">2010/011</option>
                                <option value="2009/010">2009/010</option>
                                <option value="2008/009">2008/009</option>
                                <option value="2007/008">2007/008</option>
                                <option value="2006/007">2006/007</option>
                                <option value="2005/006">2005/006</option>
                                <option value="2004/005">2004/005</option>
                                <option value="2003/004">2003/004</option>
                                <option value="2003/004">2003/004</option>
                                <option value="2002/003">2002/003</option>
                                <option value="2001/002">2001/002</option>
                                <option value="2000/001">2000/001</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="row form-group">
                        <div class="col-md-2">Audit Date</div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nepali-datepicker-1" name="audit_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Renew Date
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nepali-datepicker" name="renew_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Report Date
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nepali-datepicker-2" name="report_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"><input type="submit" class="btn btn-success" value="Set"></div>
                    </div>
                </form>
                <table class="table table-responsive table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Fiscal Year</th>
                            <th scope="col">Audit Date</th>
                            <th scope="col">Renew Date</th>
                            <th scope="col">Report Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($setdate)
                            @foreach ($setdate as $item)
                                <tr>
                                    <td>{{ $item->fiscal }}</td>
                                    <td>{{ $item->audit_date }}</td>
                                    <td>{{ $item->renew_date }}</td>
                                    <td>{{ $item->report_date }}</td>
                                    <td>
                                        <a href="{{ route('setdate.edit', $item->id) }}">
                                            <button type="button" class="btn btn-primary" data-toggle="collapse"
                                                data-target="#comments">Edit</button></a>


                                    </td>

                                </tr>

                            @endforeach

                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
