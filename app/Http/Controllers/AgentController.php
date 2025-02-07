<?php

namespace App\Http\Controllers;

class AgentController extends Controller
{
    public function him_agent_index()
    {
       return view('auth.admin.pages.agents.all_agents');
    }
}
