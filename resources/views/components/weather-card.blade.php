@props(['data_point', 'weather_icons'])

<div class="rounded-xl border border-slate-200 p-4 w-full bg-gradient-to-br from-slate-50 to-slate-200 h-[258px]">

  <p class="text-xl font-medium">
    {{ $data_point['day']->week_day }}
  </p>
  <p class="text-sm font-light mb-2">
    {{ $data_point['day']->date }}
  </p>

  <img src="{{ $weather_icons->{$data_point['weather_code']}->day->image }}" alt=""
    class="w-12 mx-auto object-cover mb-1 mt-4">
  <p class="mb-4 text-xs">
    {{ $weather_icons->{$data_point['weather_code']}->day->description }}
  </p>
  <div class="flex items-start justify-center gap-2">
    <p class="text-3xl font-bold flex items-start">
      {{ $data_point['temperature_max'] }}<span class="text-lg">°</span>
    </p>
    <p class="text-lg text-slate-500 font-bold flex items-start">
      {{ $data_point['temperature_min'] }}<span class="text-base">°</span>
    </p>
  </div>

  <div class="flex items-center gap-1 justify-center mt-4 text-slate-600">
    @if ($data_point['temperature_max'] > 40)
      <div class="temperature-high">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 1024 1792">
          <path fill="currentColor"
            d="M640 1344q0 80-56 136t-136 56t-136-56t-56-136q0-60 35-110t93-71V512h128v651q58 21 93 71t35 110m128 0q0-77-34-144t-94-112V320q0-80-56-136t-136-56t-136 56t-56 136v768q-60 45-94 112t-34 144q0 133 93.5 226.5T448 1664t226.5-93.5T768 1344m128 0q0 185-131.5 316.5T448 1792t-316.5-131.5T0 1344q0-182 128-313V320q0-133 93.5-226.5T448 0t226.5 93.5T768 320v711q128 131 128 313m128-576v128H832V768zm0-256v128H832V512zm0-256v128H832V256z" />
        </svg>
      </div>
    @endif

    @if ($data_point['temperature_max'] < 10 || $data_point['temperature_min'] < 10)
      <div class="temperature-low">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 1024 1792">
          <path fill="currentColor"
            d="M640 1344q0 80-56 136t-136 56t-136-56t-56-136q0-60 35-110t93-71v-139h128v139q58 21 93 71t35 110m128 0q0-77-34-144t-94-112V320q0-80-56-136t-136-56t-136 56t-56 136v768q-60 45-94 112t-34 144q0 133 93.5 226.5T448 1664t226.5-93.5T768 1344m128 0q0 185-131.5 316.5T448 1792t-316.5-131.5T0 1344q0-182 128-313V320q0-133 93.5-226.5T448 0t226.5 93.5T768 320v711q128 131 128 313m128-576v128H832V768zm0-256v128H832V512zm0-256v128H832V256z" />
        </svg>
      </div>
    @endif

    @if ($data_point['rain'] > 0)
      <div class="swimming">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 15 15">
          <path fill="currentColor"
            d="M10.111 2c-.112 0-.435.147-.435.147l-3.322 1.68c-.443.175-.618.881-.352 1.234l.97 1.408l-3.97 2.029L5 9.998l2.502-1.5l2.5 1.5l1.002-1.002l-3-4l2.557-1.53c.528-.266.443-.704.443-.97C11 2.286 10.644 2 10.111 2m2.141 3a1.75 1.75 0 1 0-.003 3.501A1.75 1.75 0 0 0 12.252 5M2.5 10L0 11.5V13l2.5-1.5L5 13l2.502-1.5l2.5 1.5L12 11.5l3 1.5v-1.5L12 10l-1.998 1.5l-2.5-1.5L5 11.5z" />
        </svg>
      </div>
    @endif

    @if ($data_point['wind_speed'] > 39)
      <div class="hurricane">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
          <path fill="currentColor"
            d="M15 6.79c1.86 1.07 3 3.06 3 5.21C18 22 6 22 6 22c1.25-.94 2.38-2.05 3.34-3.29a.99.99 0 0 0-.34-1.5C7.14 16.14 6 14.15 6 12C6 2 18 2 18 2c-1.25.94-2.38 2.05-3.34 3.29a.99.99 0 0 0 .34 1.5M12 14a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2" />
        </svg>
      </div>
    @endif
  </div>

</div>
