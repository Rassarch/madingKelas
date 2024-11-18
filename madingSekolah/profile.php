 <!-- Mading Upload Calendar Section -->
        <h2 class="mt-5">Mading Upload Calendar</h2>
        <div id="calendar" class="calendar"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php 
                    $events = [];
                    foreach ($mading_history as $mading) {
                        $backgroundColor = (date('Y-m-d') === $mading['tanggal']) ? '#28a745' : '#007bff';
                        $events[] = "{ 
                            title: 'Mading Uploaded', 
                            start: '{$mading['tanggal']}', 
                            backgroundColor: '{$backgroundColor}', 
                            borderColor: '{$backgroundColor}' 
                        }";
                    }
                    echo implode(',', $events); 
                    ?>
                ]
            });
            calendar.render();
        });
    </script>
