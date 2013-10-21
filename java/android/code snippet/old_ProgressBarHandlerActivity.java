package com.silenceper.base;

import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;

public class ProgressBarHandlerActivity extends Activity {
	private ProgressBar bar_progress_bar=null;
	private ProgressBar bar_progress=null;
	private Button bar_begin_btn=null;
	
	@SuppressLint("HandlerLeak")
	Handler handler=new Handler(){
		public void  handleMessage (Message msg){
			bar_progress_bar.setProgress(msg.arg1);
		} 
	};
	
	//updateThread
	Runnable updateThread=new Runnable(){
		int i=0;
		@Override
		public void run() {
			i+=10;
			System.out.println("i="+i);
			//得到一个消息对象
			Message msg=handler.obtainMessage();
			msg.arg1=i;
			
			try {
				Thread.sleep(500);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			handler.sendMessage(msg);
			if(i>=100){
				System.out.println("i>=100");
				handler.removeCallbacks(updateThread);
			}else{
				handler.post(updateThread);
			}
		}
		
		
	};
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_progress_bar_handler);
		
		bar_progress_bar=(ProgressBar) findViewById(R.id.bar_progress_bar);
		bar_progress=(ProgressBar) findViewById(R.id.bar_progress);
		bar_begin_btn=(Button) findViewById(R.id.bar_begin_btn);
		
		bar_begin_btn.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				bar_progress_bar.setVisibility(View.VISIBLE);
				bar_progress.setVisibility(View.VISIBLE);
				handler.post(updateThread);
			}
		});
		
	}

	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.progress_bar_handler, menu);
		return true;
	}

}
