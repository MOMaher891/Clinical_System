@extends('Admin.layout')

@section('content')
    <center>
        <table width="700px" border="1">
            <tr>
                <td rowspan="2">
                    <img src="{{ asset('Admin/Images/Doctors/' . $doctor->doc_image) }}" alt="My Photo" width="100%">
                </td>
                <th width="500px" height="50px" style="background-color: #009d63">Informations</th>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>ID : {{ $doctor->id }}</li>
                        <li>Name : {{ $doctor->doc_name }}</li>
                        <li>Gender : {{ $doctor->doc_gender }}</li>
                        <li>Department : {{ $doctor->department->dep_name }}</li>
                        <li>Mail : {{ $doctor->email }}</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th colspan="2" height="50px" style="background-color: #009d63">Something</th>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Something</p>
                    <p>Something</p>
                </td>
            </tr>
            <tr>
                <th colspan="2" height="50px" style="background-color: #009d63">Something</th>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Something</p>
                    <ul>
                        <li><a href="https://www.youtube.com">YouTube</a></li>
                        <li><a href="https://www.instagram.com">Instagram</a></li>
                    </ul>
                </td>
            </tr>
        </table>
    </center>

@stop()
