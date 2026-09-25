<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    private const BRANDING_DISK = 'public';

    private const BRANDING_DIR = 'branding';

    /** Keys managed by the site settings form (order = form order). */
    private const KEYS = [
        'site_name',
        'footer_tagline',
        'footer_address',
        'footer_phone',
        'whatsapp_number',
        'footer_email',
        'footer_hours',
        'copyright_owner',
        'default_meta_description',
        'public_site_label',
    ];

    public function edit()
    {
        $settings = Setting::allKeyed();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'footer_tagline' => 'nullable|string|max:2000',
            'footer_address' => 'nullable|string|max:500',
            'footer_phone' => 'nullable|string|max:100',
            'whatsapp_number' => 'nullable|string|max:30',
            'footer_email' => 'nullable|email|max:255',
            'footer_hours' => 'nullable|string|max:255',
            'copyright_owner' => 'nullable|string|max:255',
            'default_meta_description' => 'nullable|string|max:500',
            'public_site_label' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|max:4096',
            'site_favicon' => 'nullable|file|max:512|mimetypes:image/png,image/jpeg,image/gif,image/webp,image/svg+xml,image/x-icon,image/vnd.microsoft.icon',
        ]);

        foreach (self::KEYS as $key) {
            Setting::put($key, $validated[$key] ?? null);
        }

        if ($request->hasFile('site_logo')) {
            $this->deleteStoredFile(Setting::getValue('site_logo_path'));
            Setting::put('site_logo_path', $request->file('site_logo')->store(self::BRANDING_DIR, self::BRANDING_DISK));
        } elseif ($request->boolean('remove_site_logo')) {
            $this->deleteStoredFile(Setting::getValue('site_logo_path'));
            Setting::put('site_logo_path', null);
        }

        if ($request->hasFile('site_favicon')) {
            $this->deleteStoredFile(Setting::getValue('favicon_path'));
            Setting::put('favicon_path', $request->file('site_favicon')->store(self::BRANDING_DIR, self::BRANDING_DISK));
        } elseif ($request->boolean('remove_favicon')) {
            $this->deleteStoredFile(Setting::getValue('favicon_path'));
            Setting::put('favicon_path', null);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Site settings saved successfully.');
    }

    private function deleteStoredFile(?string $path): void
    {
        if (! is_string($path) || $path === '') {
            return;
        }
        if (Storage::disk(self::BRANDING_DISK)->exists($path)) {
            Storage::disk(self::BRANDING_DISK)->delete($path);
        }
    }
}
