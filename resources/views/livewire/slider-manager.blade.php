<div>
    <div class="ibox">
        <div class="ibox-title">
            <h5>Slider Management</h5>
        </div>

        <div class="ibox-content">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <ul class="nav nav-tabs">
                <li class="{{ $tab === 'general' ? 'active' : '' }}">
                    <a wire:click="$set('tab', 'general')">General</a>
                </li>
                <li class="{{ $tab === 'home' ? 'active' : '' }}">
                    <a wire:click="$set('tab', 'home')">Home</a>
                </li>
                <li class="{{ $tab === 'settings' ? 'active' : '' }}">
                    <a wire:click="$set('tab', 'settings')">Settings</a>
                </li>
            </ul>

            <div class="tab-content p-3">
                @if ($tab === 'general')
                    <div>
                        <h4>General Content</h4>
                        <p>Put your general slider content here.</p>
                    </div>
                @elseif ($tab === 'home')
                    <div>
                        <h4>Home Content</h4>
                        <p>Put your home slider content here.</p>
                    </div>
                @elseif ($tab === 'settings')
                    <div>
                        <h4>Settings</h4>

                        <form wire:submit.prevent="saveSettings">
                            <div class="form-group">
                                <label>Website Title</label>
                                <input type="text" class="form-control" wire:model.defer="site_title">
                            </div>
                            <button class="btn btn-primary" type="submit">Save Title</button>
                        </form>

                        <hr>

                        <form wire:submit.prevent="uploadLogo">
                            <div class="form-group">
                                <label>Upload Logo (logo.png)</label>
                                <input type="file" wire:model="logo" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">Upload Logo</button>
                        </form>

                        <hr>

                        <form wire:submit.prevent="uploadFavicon">
                            <div class="form-group">
                                <label>Upload Favicon (favicon.png)</label>
                                <input type="file" wire:model="favicon" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">Upload Favicon</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
