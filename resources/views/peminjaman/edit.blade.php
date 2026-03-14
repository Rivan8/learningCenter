@extends('layouts.app')
@section('content')
    <div class="page-category">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ $title }}</h4>
                        <div class="card-tools">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>

                    </div>
                    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class=" text-center mb-3">
                            
                                <label for="user_id" class="form-label"><h2><strong>{{ $borrowing->user->name }}</strong></h2></label>
                           
                           
                            <input type="hidden" name="user_id" value="{{ $borrowing->user->id }}">
                            {{-- <input type="text" class="form-control" id="user_id" value="{{ $borrowing->user->name }}" readonly> --}}

                        </div>
                        <div class=" row mb-3">
                            <div class="col-md-3">
                                <label for="user_id" class="form-label">Judul Buku : </label>
                            </div>
                            <div class="col-md-6">
                                <label for="book_id" class="form-label">{{ $borrowing->book->title }}</label>
                            </div>
                            <input type="hidden" name="book_id" value="{{ $borrowing->book->id }}">
                            {{-- <input type="text" class="form-control" id="user_id" value="{{ $borrowing->user->name }}" readonly> --}}

                        </div>
                        <div class=" row mb-3">
                            <div class="col-md-3">
                                <label for="borrowed_at" class="form-label">Tanggal Pinjam : </label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="borrowed_at"
                                    value="{{ $borrowing->borrowed_at }}" readonly>
                            </div>

                            {{-- <input type="text" class="form-control" id="user_id" value="{{ $borrowing->user->name }}" readonly> --}}
                        </div>
                        <div class=" row mb-3">
                            <div class="col-md-3">
                                <label for="due_date" class="form-label">Tanggal Kembali : </label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="due_date"
                                    value="{{ $borrowing->due_date }}" readonly>
                            </div>

                            {{-- <input type="text" class="form-control" id="user_id" value="{{ $borrowing->user->name }}" readonly> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="returned_at" class="form-label">Tanggal Dikembalikan</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="date" class="form-control @error('returned_at') is-invalid @enderror"
                                    id="returned_at" name="returned_at"
                                    value="{{ old('returned_at', $borrowing->returned_at ?? now()->format('Y-m-d')) }}">
                                @error('returned_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 
                            <div class="col-md-3 mb-3">
                           
                                <select hidden class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                                  >
                                    <option value="Dikembalikan" 
                                        {{ old('status', $borrowing->status) == 'Dikembalikan' ? 'selected' : '' }}>
                                        Dikembalikan</option>
                                    {{-- <option value="Dipinjam" {{ old('status', $borrowing->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option> --}}
    
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                       
                        
                       
                            <!-- Elemen form lainnya -->
                            <button type="submit" class="btn btn-primary" id="update" onclick="return confirm('Yakin ingin mengembalikan peminjaman ini?')">Kembalikan</button>
                      

                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>





@endsection
