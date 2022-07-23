const route = {
	path: `/${process.env.VUE_APP_SLUG}`,
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "system" */ '@modules/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'system-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'system-dashboard',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/dashboard/index.vue'),
		},

		// faculty
		{
			path: 'faculty',
			name: 'system-faculty',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty/index.vue'),
		},

		{
			path: 'faculty/create',
			name: 'system-faculty-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty/crud/create.vue'),
		},

		{
			path: 'faculty/:faculty/show',
			name: 'system-faculty-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty/crud/show.vue'),
		},

		{
			path: 'faculty/:faculty/edit',
			name: 'system-faculty-edit',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty/crud/edit.vue'),
		},

		// study
		{
			path: 'faculty/:faculty/study',
			name: 'system-study',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study/index.vue'),
		},

		{
			path: 'faculty/:faculty/study/create',
			name: 'system-study-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study/crud/create.vue'),
		},

		{
			path: 'faculty/:faculty/study/:study/show',
			name: 'system-study-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study/crud/show.vue'),
		},

		{
			path: 'faculty/:faculty/study/:study/edit',
			name: 'system-study-edit',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study/crud/edit.vue'),
		},

		// lecture
		{
			path: 'faculty/:faculty/study/:study/lecture',
			name: 'system-study-lecture',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study-lecture/index.vue'),
		},

		{
			path: 'faculty/:faculty/study/:study/lecture/create',
			name: 'system-study-lecture-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study-lecture/crud/create.vue'),
		},

		{
			path: 'faculty/:faculty/study/:study/lecture/:lecture/show',
			name: 'system-study-lecture-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study-lecture/crud/show.vue'),
		},

		{
			path: 'faculty/:faculty/study/:study/lecture/:lecture/edit',
			name: 'system-study-lecture-edit',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/faculty-study-lecture/crud/edit.vue'),
		},

		// lecture
		{
			path: 'lecture',
			name: 'system-lecture',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/lecture/index.vue'),
		},

		{
			path: 'lecture/create',
			name: 'system-lecture-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/lecture/crud/create.vue'),
		},

		{
			path: 'lecture/:lecture/show',
			name: 'system-lecture-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/lecture/crud/show.vue'),
		},

		{
			path: 'lecture/:lecture/edit',
			name: 'system-lecture-edit',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/lecture/crud/edit.vue'),
		},

		// position
		{
			path: 'position',
			name: 'system-position',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/position/index.vue'),
		},

		{
			path: 'position/create',
			name: 'system-position-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/position/crud/create.vue'),
		},

		{
			path: 'position/:position/show',
			name: 'system-position-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/position/crud/show.vue'),
		},

		// scholarship
		{
			path: 'scholarship',
			name: 'system-scholarship',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/scholarship/index.vue'),
		},

		{
			path: 'scholarship/create',
			name: 'system-scholarship-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/scholarship/crud/create.vue'),
		},

		{
			path: 'scholarship/:scholarship/show',
			name: 'system-scholarship-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/scholarship/crud/show.vue'),
		},

		// user
		{
			path: 'user',
			name: 'system-user',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/user/index.vue'),
		},

		{
			path: 'user/create',
			name: 'system-user-create',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/user/crud/create.vue'),
		},

		{
			path: 'user/:user/show',
			name: 'system-user-show',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/user/crud/show.vue'),
		},

		// recap
		{
			path: 'recap',
			name: 'system-recap',
			component: () => import(/* webpackChunkName: "system" */ '@modules/pages/recap/index.vue'),
		},
	]
};

export default route;