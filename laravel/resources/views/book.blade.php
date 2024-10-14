@extends('main')
@section('content')

  <x-ui.banner.title
    subtitle="Réservez votre cours ici"
    title="Réservation"
    breadcrumb="Réservation"
  />

  <section class="bg-white">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="block mt-4 max-w-6xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <iframe src="https://app.acuityscheduling.com/schedule.php?owner=32344966&ref=embedded_csp" title="Prendre rendez-vous" height="800" width="100%" frameBorder="0" style="margin-bottom: -120px"></iframe><script src="https://embed.acuityscheduling.com/js/embed.js" type="text/javascript"></script>

      </div>

    </div>
  </section>
@stop
@section('title')
    Réservation
@stop
