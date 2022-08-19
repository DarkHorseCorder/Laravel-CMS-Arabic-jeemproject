<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h4 class="m-0 text-dark">
                    @if (!request()->segment(2))
                        {{ ucfirst( 'dashboard' ) }}
                    @else
                        {{ ucfirst( request()->segment(2) ) }}
                    @endif
                </h4>
            </div>
            {{-- <div class="col-sm-8">
                <ol class="breadcrumb float-sm-right">

                    <?php $segments = ''; ?>
                    @foreach ( request()->segments() as $segment)

                        <?php $segments .= '/'.$segment; ?>

                        <li class="breadcrumb-item"><a href="{{ $segments }}"> {{ ucfirst($segment) }}</a></li>

                    @endforeach
                </ol>
            </div> --}}
        </div>
    </div>
</div>
