<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Animal;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class animalNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Animal $animal)
    {
        $this->animal = $animal;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable):array
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'nombre' => $this->animal -> nombre, 'imagen'=>this->animal->imagen, 'evento' => $this -> animal ->evento->nombre_evento
            
        ];
    }
    public function toBroadcast($notifiable): BroadcastMessage

    {

        return new BroadcastMessage([

            //'message' => "$this->animal (User $notifiable->id)",

            'animal'=>$this->animal->nombre

        ]);
        

    }
}