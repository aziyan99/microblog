@section('title', 'Message')
<div class="row">
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @can('isAdmin')
        <div class="row">
            <div class="col-3">
                <button class="mt-3 mb-2 btn btn-danger text-light" wire:click="clearAllMessage">
                    <i class="mdi mdi-delete-forever me-2"></i>
                    Clear all message
                </button>
            </div>
        </div>
    @endcan
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Inbox
                </h3>
                <h4 class="card-subtitle">Listing all of your inbox message</h4>
                <div class="list-group mt-3">
                    @forelse ($inBoxs as $inbox)
                        <a href="javascript:;" wire:click="openInBox({{ $inbox->id }})" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $inbox->sender_name->name }}</h5>
                            <small>{{ $inbox->created_at->diffForHumans() }}</small>
                        </div>
                        <small>{{ Str::limit($inbox->subject, 20, '...') }}</small>
                        </a>
                    @empty
                    <div class="text-center text-muted">
                        <small><i>Inbox are empty</i></small>
                    </div>
                    @endforelse
                  </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Outbox
                </h3>
                <h4 class="card-subtitle">Listing all of your outbox message</h4>
                <div class="list-group mt-3">
                    @forelse ($outBoxs as $outbox)
                        <a href="javascript:;" wire:click="openOutBox({{ $outbox->id }})" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $outbox->receiver_name->name }}</h5>
                            <small>{{ $outbox->created_at->diffForHumans() }}</small>
                        </div>
                        <small>{{ Str::limit($outbox->subject, 20, '...') }}</small>
                        </a>
                    @empty
                        <div class="text-center text-muted">
                            <small><i>Outbox are empty</i></small>
                        </div>
                    @endforelse
                  </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
        @if($isOutboxOpen)
        <div class="card">
            <div class="card-body">
                <button class="btn btn-secondary" wire:click="closeAllBox">
                    <i class="mdi mdi-close-circle me-2"></i>
                    Close
                </button>
                <table class="table table-hover table-bordered mt-3">
                    <tr>
                        <th>Receiver</th>
                        <td>{{ $outboxMessage->receiver_name->name }}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $outboxMessage->subject }}</td>
                    </tr>
                    <tr>
                        <th>message</th>
                        <td>{{ $outboxMessage->message }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @elseif ($isInboxOpen)
        <div class="card">
            <div class="card-body">
                <button class="btn btn-secondary" wire:click="closeAllBox">
                    <i class="mdi mdi-close-circle me-2"></i>
                    Close
                </button>
                <table class="table table-hover table-bordered mt-3">
                    <tr>
                        <th>Sender</th>
                        <td>{{ $inboxMessage->sender_name->name }}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $inboxMessage->subject }}</td>
                    </tr>
                    <tr>
                        <th>message</th>
                        <td>{{ $inboxMessage->message }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Create new message
                </h3>
                <h4 class="card-subtitle">Compose new message to registered user in system</h4>

                <form class="mt-3" wire:submit.prevent="sendMessage">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>To</label>
                                <select class="form-control @error('receiverId') is-invalid @enderror" wire:model="receiverId">
                                    <option value="">-- choose --</option>
                                    @foreach ($users as $user)
                                        @if ($user->id != $senderId)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('receiverId')
                                    <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" wire:model="subject" class="form-control @error('subject') is-invalid @enderror">
                                @error('subject')
                                    <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea wire:model="message" cols="30" rows="4" class="form-control @error('message') is-invalid @enderror"></textarea>
                            @error('message')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                <i class="mdi mdi-send me-2"></i>
                                Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
