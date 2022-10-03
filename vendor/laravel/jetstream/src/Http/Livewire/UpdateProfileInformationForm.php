<?php

namespace Laravel\Jetstream\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );        
        //dd(Auth::guard()->gName());
        if(Auth::guard()->gName() === 'admin'){
            if (isset($this->photo)) {
                return redirect()->route('admin.profile.show');
            }

            $this->emit('saved');

            $this->emit('refresh-nav-menu');
        }else{
            if (isset($this->photo)) {
                return redirect()->route('profile.show');
            }

            $this->emit('saved');

            $this->emit('refresh-navigation-menu');
        }
        

        
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        if(Auth::guard()->gName() === 'admin'){
            $this->emit('refresh-nav-menu');
        }else{
            $this->emit('refresh-navigation-menu');
        }
        
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if(Auth::guard()->gName() === 'admin'){
            return view('admin.profile.update-profile-information-form');
        }else{
            return view('profile.update-profile-information-form');
        }
    }
}
