from flask import Flask, render_template, request
from pytube import YouTube

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/download', methods=['POST'])
def download():
    if request.method == 'POST':
        video_url = request.form['video_url']
        output_path = request.form['output_path']

        try:
            yt = YouTube(video_url)
            stream = yt.streams.get_highest_resolution()
            stream.download(output_path)
            message = f"تم تحميل الفيديو بنجاح إلى: {output_path}"
        except Exception as e:
            message = f"حدث خطأ أثناء تحميل الفيديو: {str(e)}"

        return render_template('download.html', message=message)

if __name__ == '__main__':
    app.run(debug=True)
