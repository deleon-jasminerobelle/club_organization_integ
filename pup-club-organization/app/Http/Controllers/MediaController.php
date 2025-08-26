<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    
    public function create()
    {
        return view('media.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
            'type' => 'required|in:image,video,document,audio',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,avi,mov,doc,docx,pdf,mp3,wav|max:10240',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('media', $filename, 'public');

            // Create media record
            $mediaData = [
                'filename' => $filename,
                'original_filename' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'file_path' => 'storage/' . $filePath,
                'title' => $request->title,
                'description' => $request->description,
                'alt_text' => $request->alt_text,
                'type' => $request->type,
                'collection' => 'gallery',
                'organization_id' => 2, // Use valid organization ID
            ];

            // Only add user_id if authenticated
            if (auth()->check()) {
                $mediaData['user_id'] = auth()->id();
            }

            $media = Media::create($mediaData);

            return redirect()->route('gallery')->with('success', 'Media uploaded successfully!');
        }

        return back()->with('error', 'File upload failed.');
    }

    
    public function index()
    {
        $media = Media::where('collection', 'gallery')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('gallery', compact('media'));
    }
}
