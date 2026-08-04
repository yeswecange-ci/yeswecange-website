<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotChannel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatbotChannelController extends Controller
{
    public function index(): View
    {
        return view('admin.chatbot-channels.index', [
            'chatbotChannels' => ChatbotChannel::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.chatbot-channels.create');
    }

    public function store(Request $request): RedirectResponse
    {
        ChatbotChannel::create($this->validated($request));

        return redirect()->route('admin.chatbot-channels.index')->with('status', 'chatbot-channel-created');
    }

    public function edit(ChatbotChannel $chatbotChannel): View
    {
        return view('admin.chatbot-channels.edit', ['chatbotChannel' => $chatbotChannel]);
    }

    public function update(Request $request, ChatbotChannel $chatbotChannel): RedirectResponse
    {
        $chatbotChannel->update($this->validated($request));

        return redirect()->route('admin.chatbot-channels.index')->with('status', 'chatbot-channel-updated');
    }

    public function destroy(ChatbotChannel $chatbotChannel): RedirectResponse
    {
        $chatbotChannel->delete();

        return redirect()->route('admin.chatbot-channels.index')->with('status', 'chatbot-channel-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'label_fr' => ['required', 'string', 'max:60'],
            'label_en' => ['required', 'string', 'max:60'],
        ]);

        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
