@extends('layouts.app', ['title' => __('Member Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <h3 class="mb-0">{{ $events->name }}</h3><br><br>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('All Event Participants') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.event.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <a href="{{ route('admin.event.member.create') }}" class="btn btn-sm btn-primary">{{ __('Add member') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events->users as $user)
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <span class="avatar avatar-sm rounded-circle">
                                                    <img alt="Image placeholder" src="{{ Gravatar::src($user->email) }}">
                                                </span>&nbsp&nbsp&nbsp&nbsp{{ $user->name }}
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('admin.event.member.destroy', $user->id) }}" method="post">

                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            
                                                            <input name="eventid" type="hidden" value="{{ $events->id }}">
                                                            {{-- {{dd($clubs->id)}} --}}
                                                            
                                                            <a class="dropdown-item" href="{{ route('admin.event.edit', $events) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to remove this member?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{-- {{ $users->links() }} --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection