<div class="flex">
@foreach ($orders as $order)
  @if($order['email'] == auth()->user()->email)

<div class="flex flex-col mt-4 mr-4 max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
  <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $order['title'] }} <span class="font-thin">(#{{$order['id']}})</span></h5>

  <p class="font-normal text-gray-700 dark:text-gray-400">
    <i class="fi fi-sr-money-check-edit-alt text-gray-500 mt-1"></i>
    Paiement :
    @if($order['status'] == 'paid')
      <span class="text-green-800">Confirmé</span>
    @else
      <span class="text-red-800">En attente</span>
    @endif
  </p>

  <p class="font-normal text-gray-700 dark:text-gray-400">
    <i class="fi fi-br-calendar text-gray-500 mt-1"></i>
    Date de commande : {{ \Carbon\Carbon::parse($order['time'])->format('d/m/Y') }}
  </p>

  <p class="font-normal text-gray-700 dark:text-gray-400">
    <i class="fi fi-br-calendar-clock text-gray-500 mt-1"></i>
    @if($order['title'] == 'Pack 10H cours particuliers')
      Date de fin : {{ \Carbon\Carbon::parse($order['time'])->addDays(93)->format('d/m/Y') }}
    @elseif($order['title'] == 'Pack 20H cours particuliers')
      Date de fin : {{ \Carbon\Carbon::parse($order['time'])->addDays(186)->format('d/m/Y') }}
    @endif
  </p>

  <hr class="my-4 border-gray-200 dark:border-gray-700">
  <p class="font-normal text-gray-700 dark:text-gray-400">
    Nombre d'heures restantes :
    @foreach ($packs as $pack)
      @if($order['id'] == $pack['orderID'])
        @foreach($pack['remainingCounts'] as $remainingCount)
            <span class="text-gray-700 dark:text-gray-400">{{ $remainingCount }} heures</span>
        @endforeach
      @endif
    @endforeach
  </p>

    <div class="flex items-center mt-2">
      @foreach($packs as $pack)
        @if($order['id'] == $pack['orderID'])
          <div class="relative">
            <input id="couponCode-{{ $order['id'] }}" type="text" value="{{ $pack['certificate'] }}" class="blur-sm text-gray-700 dark:text-gray-400 pr-16" readonly data-id="{{ $order['id'] }}">
            <button onclick="revealCoupon( {{$order['id']}} )" class="mt-1 absolute right-0 top-0 h-full px-4 bg-transparent text-gray-500 dark:text-gray-400 rounded-r">
                <span class="flex items-center">
                  <p class="mb-2 mr-2">Afficher mon coupon</p>
                  <i class="fi fi-br-eye-crossed text-gray-500 ml-1" id="couponVisibility-{{ $order['id'] }}"></i>
                </span>
            </button>
          </div>
        @endif
      @endforeach
    </div>
  </div>
    @endif
@endforeach

</div>



<script>
  function revealCoupon(orderID) {
    const couponCode = document.getElementById('couponCode-' + orderID);
    const eyeIcon = document.getElementById('couponVisibility-' + orderID);

    if (couponCode.classList.contains('blur-sm')) {
      couponCode.classList.remove('blur-sm');
      eyeIcon.classList.remove('fi-br-eye-crossed');
      eyeIcon.classList.add('fi-br-eye');
    } else {
      couponCode.classList.add('blur-sm');
      eyeIcon.classList.remove('fi-br-eye');
      eyeIcon.classList.add('fi-br-eye-crossed');
    }
  }
</script>
