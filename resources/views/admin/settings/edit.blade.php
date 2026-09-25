@extends('admin.layouts.app')

@section('page_title', 'Site Settings')

@section('admin_content')

<x-admin.page-intro
    title="Site settings"
    lead="Branding, footer copy, and defaults used across the public site and admin header."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Site settings', 'url' => null],
    ]"
/>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="adm-split-2">
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3><i class="fa fa-signature" style="margin-right:8px;color:#d4a017;"></i> Brand &amp; SEO</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Site name <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="site_name" class="adm-input" required value="{{ old('site_name', $settings['site_name'] ?? '') }}" placeholder="Stackify Studio">
                        <p class="adm-hint">Used in the public header/footer logo text when set.</p>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Default meta description</label>
                        <textarea name="default_meta_description" class="adm-textarea" rows="3" placeholder="Fallback when a page does not set its own description">{{ old('default_meta_description', $settings['default_meta_description'] ?? '') }}</textarea>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Admin topbar site label</label>
                        <input type="text" name="public_site_label" class="adm-input" value="{{ old('public_site_label', $settings['public_site_label'] ?? '') }}" placeholder="stackifystudio.com">
                        <p class="adm-hint">Short label next to the globe in the admin bar (not required to be a valid URL).</p>
                    </div>
                </div>
            </div>

            <div class="adm-card" style="margin-top:24px;">
                <div class="adm-card-header"><h3><i class="fa fa-align-left" style="margin-right:8px;color:#d4a017;"></i> Footer blurb</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Footer tagline</label>
                        <textarea name="footer_tagline" class="adm-textarea" rows="6" placeholder="Paragraph under the logo in the footer">{{ old('footer_tagline', $settings['footer_tagline'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div>
            @php
                $customLogoUrl = \App\Support\SiteBranding::customSiteLogoUrl($settings ?? []);
                $defaultLogoUrl = \App\Support\SiteBranding::defaultLogoUrl();
                $hasCustomLogo = \App\Support\SiteBranding::hasCustomLogo($settings ?? []);
                $faviconUrl = \App\Support\SiteBranding::storedFaviconUrl($settings ?? []);
            @endphp
            <div class="adm-card">
                <div class="adm-card-header"><h3><i class="fa fa-image" style="margin-right:8px;color:#d4a017;"></i> Branding images</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Site logo (header &amp; footer)</label>
                        <div class="adm-file-input-wrapper">
                            <input type="file" name="site_logo" id="site_logo" accept="image/png,image/jpeg,image/webp,image/gif,image/svg+xml,.svg,.png,.jpg,.jpeg,.webp,.gif">
                            <div class="adm-file-btn">
                                <i class="fa fa-cloud-arrow-up"></i>
                                <span>{{ $hasCustomLogo ? 'Replace custom logo...' : 'Upload custom logo...' }}</span>
                            </div>
                        </div>
                        <div class="adm-img-preview contain-fit" id="site_logo_preview">
                            @if ($hasCustomLogo)
                                <img src="{{ $customLogoUrl }}" alt="Current custom site logo">
                            @else
                                <img src="{{ $defaultLogoUrl }}" alt="Default Stackify lockup logo">
                            @endif
                        </div>
                        @if ($hasCustomLogo)
                            <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:var(--text); cursor:pointer; margin-top:10px;">
                                <input type="checkbox" name="remove_site_logo" value="1" {{ old('remove_site_logo') ? 'checked' : '' }}>
                                Remove custom logo (revert to default Stackify Studio lockup)
                            </label>
                        @else
                            <span class="adm-hint" style="display:block; margin-top:6px; color:#10b981; font-weight:600;"><i class="fa fa-check-circle"></i> Default Stackify Studio logo lockup active</span>
                        @endif
                        <p class="adm-hint">Optional. Shown in the public header and footer. Default is the official Stackify Studio brand lockup (<code>img/core-img/stackify_final_lockup.svg</code>). Uploading a file overrides it.</p>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Favicon</label>
                        <div class="adm-file-input-wrapper">
                            <input type="file" name="site_favicon" id="site_favicon" accept=".ico,.png,.svg,.jpg,.jpeg,.gif,.webp,image/*">
                            <div class="adm-file-btn">
                                <i class="fa fa-cloud-arrow-up"></i>
                                <span>{{ $faviconUrl ? 'Replace favicon...' : 'Choose favicon...' }}</span>
                            </div>
                        </div>
                        <div class="adm-img-preview contain-fit" id="site_favicon_preview" style="height: 160px;">
                            @if ($faviconUrl)
                                <img src="{{ $faviconUrl }}" alt="Current favicon">
                            @else
                                <span>No favicon uploaded</span>
                            @endif
                        </div>
                        @if ($faviconUrl)
                            <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:var(--text); cursor:pointer; margin-top:10px;">
                                <input type="checkbox" name="remove_favicon" value="1" {{ old('remove_favicon') ? 'checked' : '' }}>
                                Remove custom favicon (after save)
                            </label>
                        @endif
                        <p class="adm-hint">Optional. ICO, PNG, SVG, or WebP. Max 512&nbsp;KB. If removed, the default site favicon is used.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="adm-card" style="margin-top:24px;">
        <div class="adm-card-header"><h3><i class="fa fa-phone" style="margin-right:8px;color:#d4a017;"></i> Footer “Get in touch” column</h3></div>
        <div class="adm-card-body">
            <div class="adm-form-row">
                <div class="adm-form-group">
                    <label class="adm-label">Address line</label>
                    <input type="text" name="footer_address" class="adm-input" value="{{ old('footer_address', $settings['footer_address'] ?? '') }}">
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Phone</label>
                    <input type="text" name="footer_phone" class="adm-input" value="{{ old('footer_phone', $settings['footer_phone'] ?? '') }}">
                </div>
            </div>
            <div class="adm-form-row">
                <div class="adm-form-group">
                    <label class="adm-label">Email</label>
                    <input type="email" name="footer_email" class="adm-input" value="{{ old('footer_email', $settings['footer_email'] ?? '') }}">
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Hours line</label>
                    <input type="text" name="footer_hours" class="adm-input" value="{{ old('footer_hours', $settings['footer_hours'] ?? '') }}">
                </div>
            </div>
            <p class="adm-hint" style="margin:0;">Contact cards on the contact page are managed separately under <strong>Contact cards</strong>.</p>
        </div>
    </div>

    <div class="adm-split-2" style="margin-top:24px;">
        <div class="adm-card">
            <div class="adm-card-header"><h3><i class="fa fa-whatsapp" style="margin-right:8px;color:#25d366;"></i> WhatsApp contact</h3></div>
            <div class="adm-card-body">
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label">WhatsApp number</label>
                    <input type="text" name="whatsapp_number" class="adm-input" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" placeholder="+923123456789">
                    <p class="adm-hint">Used for the floating WhatsApp button. Include country code.</p>
                </div>
            </div>
        </div>
        <div class="adm-card">
            <div class="adm-card-header"><h3><i class="fa fa-copyright" style="margin-right:8px;color:#d4a017;"></i> Copyright bar</h3></div>
            <div class="adm-card-body">
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label">Copyright owner name</label>
                    <input type="text" name="copyright_owner" class="adm-input" value="{{ old('copyright_owner', $settings['copyright_owner'] ?? '') }}" placeholder="Stackify Studio">
                    <p class="adm-hint">Shown as: Copyright © YEAR <strong>[this value]</strong>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:28px;">
        <button type="submit" class="adm-btn adm-btn-primary" style="padding:12px 28px;">
            <i class="fa fa-floppy-disk"></i> Save settings
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        setupImagePreview('site_logo', 'site_logo_preview');
        setupImagePreview('site_favicon', 'site_favicon_preview');
    });
</script>

@endsection
