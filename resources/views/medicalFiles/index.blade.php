@extends('layouts.master')

@section('title')
@endsection

@section('css')
@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-5">
                <h4 class="page-title">Medical Files</h4>
            </div>
            <div class="col-sm-7 col-7 text-right m-b-30 d-flex justify-content-end align-items-center">

                <a href="{{ route('medicalFiles.create') }}" class="btn btn-primary btn-rounded mr-3">
                    <i class="fa fa-plus"></i> Add Medical File
                </a>
                <!-- أيقونة سلة المحذوفات -->
                {{-- <a href="{{ route('medicalFiles.trash') }}">
                    <i class="fa fa-trash-o" style="font-size:36px"></i>
                </a> --}}
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Patient Name</label>
                    <input type="text" class="form-control floating">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Patient insurance number</label>
                    <input type="text" class="form-control floating">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>
        <!-- إذا كانت الملفات الطبية فارغة -->
        @if($medicalFiles->isEmpty())
            <div class="alert alert-warning">
                <p>No medical files found for your patients.</p>
            </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <role="row" class="even">
                                </role="row"><table
                                    class="table table-striped custom-table mb-0 datatable dataTable no-footer"
                                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="#: activate to sort column descending" style="width: 62.125px;">
                                                #</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Department Name: activate to sort column ascending"
                                                style="width: 307.875px;">patient id</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Department Name: activate to sort column ascending"
                                                style="width: 307.875px;">patient name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending"
                                                style="width: 194.188px;">patient email</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending"
                                                style="width: 194.188px;">phone number</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending"
                                                style="width: 194.188px;">Date of Birth</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending"
                                                style="width: 194.188px;">Insurance number</th>
                                            <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0"

                                            rowspan="1" colspan="1"
                                                aria-label="Action: activate to sort column ascending"
                                                style="width: 138.812px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($medicalFiles as $file)                              
                                            <tr role="row" class="odd">
                                            <td>{{ $file->id }}</td>
                                            <td>{{ $file->patient->id }}</td>
                                            <td>{{ $file->patient->user->name }}</td>
                                            <td>{{ $file->patient->user->email }}</td>
                                            <td>{{ $file->patient->user->phone_number }}</td>
                                            <td>{{ $file->patient->dob }}</td>
                                            <td>{{ $file->patient->insurance_number }}</td>
                                             <td class="text-right">
                                            <div class="action-buttons" style="white-space: nowrap;">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('medicalFiles.edit', $file->id) }}"
                                                    style="display: inline-block; margin-right: 5px;">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('medicalFiles.show', $file->id) }}"
                                                    style="display: inline-block; margin-right: 5px;">
                                                    <i class="fa fa-eye m-r-5"></i> Show
                                                </a>
                                                <form action="{{ route('medicalFiles.destroy', $file->id) }}"
                                                    method="POST" style="display: inline-block; margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        style="padding: 2px 6px; font-size: 0.9rem; display: inline-block;">
                                                        <i class="fa fa-trash-o"
                                                            style="font-size: 0.8rem; margin-right: 3px;"></i> Trash
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                Showing 1 to 6 of 6 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="DataTables_Table_0_previous"><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a
                                            href="#" aria-controls="DataTables_Table_0" data-dt-idx="2"
                                            tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-secondary mb-3" rel="prev"> <i class="fa fa-arrow-left mr-2"></i>Back</a>
    </div>
    @endif
    </div>
@endsection


@section('scripts')
@endsection