<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ClientMessageReply;
use App\Models\ClientMessage;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $settings = SiteSetting::asArray();
        $services = Service::orderBy('sort_order')->get();
        $clientMessages = ClientMessage::query()->latest()->get();

        return view('admin.dashboard', compact('settings', 'services', 'clientMessages'));
    }

    public function updateSettings(Request $request)
    {
        $keys = [
            'site_name',
            'site_tagline',
            'home_hero_title',
            'home_hero_description',
            'home_primary_button_text',
            'home_primary_button_url',
            'about_title',
            'about_description',
            'about_mission',
            'about_vision',
            'contact_phone',
            'contact_email',
            'contact_address',
            'footer_copyright',
            'footer_description',
            'facebook_url',
            'instagram_url',
            'x_url',
            'linkedin_url',
            'youtube_url',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                SiteSetting::set($key, $request->input($key), 'content');
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Website content updated successfully.');
    }

    public function deleteMessage(ClientMessage $clientMessage)
    {
        $clientMessage->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Client message deleted successfully.');
    }

    public function replyToMessage(Request $request, ClientMessage $clientMessage)
    {
        $validated = $request->validate([
            'reply' => ['required', 'string', 'max:10000'],
        ]);

        Mail::to($clientMessage->email)->send(new ClientMessageReply($clientMessage, $validated['reply']));

        return redirect()->route('admin.dashboard')->with('success', 'Reply sent to '.$clientMessage->email.'.');
    }

    public function profile()
    {
        return view('admin.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        $user->update($validated);

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Auth::user()->update([
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.change-password')->with('success', 'Password updated successfully.');
    }
}
